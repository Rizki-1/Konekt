<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\SendEmail;
use App\Models\userOrder;
use App\Models\notifikasi;
use Illuminate\Support\Str;
use App\Models\penjuallogin;
use Illuminate\Http\Request;
use App\Models\adminkategori;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\notifikasipenjual;
use App\Models\pengemmbaliandana;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Models\adminmetodepembayaran;
use App\Models\pengajuandanapenjual;
use Illuminate\Support\Facades\Storage;

class adminpembeliancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboardusercontrollers = userOrder::where('adminstatus', 'notapprove')
            ->join('penjuallogins', 'penjuallogins.user_id', '=', 'user_orders.toko_id')
            ->select('user_orders.*', 'penjuallogins.nama_toko')
            ->get();
        $penjual = barangpenjual::all();
        $adminnotifikasi = adminnotifikasi::all();
        $notifikasi_penjual = notifikasipenjual::all();
        $notifikasi = notifikasi::all();
        return view('admin.pembelian', compact('dashboardusercontrollers', 'penjual', 'notifikasi', 'notifikasi_penjual', 'adminnotifikasi'));
    }

    public function metodpembayaran()
    {
        $adminmp = adminmetodepembayaran::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    public function DashboardAdmin()
    {
        $adminnotifikasi = adminnotifikasi::where('is_read', false)->get();
        $totalpengguna = User::where('role', 'penjual')->count();
        $totaluser = User::where('role', 'user')->count();
        $totalpembelian = userOrder::where('pembelianstatus', 'statusselesai')->count();
        $totalharga = userOrder::where('pembelianstatus', 'statusselesai')->sum('totalharga');
        $untung = $totalharga * 0.05;

        $data = userOrder::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            'pembelianstatus',
            DB::raw('count(*) as total')
        )
            ->whereIn('pembelianstatus', ['statusselesai'])
            ->whereYear('created_at', Carbon::now()->year) // Hanya ambil data untuk tahun saat ini
            ->groupBy('year', 'month', 'pembelianstatus')
            ->get();

        $processedData = [];
        $currentYear = Carbon::now()->year; // Tahun saat ini
        $currentMonth = Carbon::now()->month; // Bulan saat ini

        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::createFromDate($currentYear, $month, 1); // Membuat objek Carbon dari tahun dan bulan
            $yearMonth = $date->isoFormat('MMMM'); // Format bulan menjadi nama bulan dalam bahasa Inggris

            $color = ($month == $currentMonth) ? 'blue' : 'green'; // Beri warna biru untuk bulan saat ini, jika bukan bulan saat ini, beri warna hijau

            $processedData[$yearMonth] = [
                'month' => $yearMonth,
                'statusselesai' => 0,
                'color' => $color,
            ];
        }

        foreach ($data as $item) {
            $yearMonth = Carbon::createFromDate($item->year, $item->month, 1)->isoFormat('MMMM'); // Format bulan pada data

            if (isset($processedData[$yearMonth])) {
                $processedData[$yearMonth]['statusselesai'] = $item->total;
            }
        }

        $chartData = array_values($processedData);

        return view('admin.dashboard', compact('adminnotifikasi', 'totalpengguna', 'totaluser', 'totalpembelian', 'untung', 'chartData'));
    }

    public function terima($id)
    {
        $dashboardusercontrollers = userOrder::find($id);
        $toko_id = $dashboardusercontrollers->toko_id;

        if (!$dashboardusercontrollers) {
            // Tindakan yang harus diambil jika ID tidak ditemukan
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }

        $dashboardusercontrollers->adminstatus = 'approve';
        $dashboardusercontrollers->save();

        $notifikasipenjual = new notifikasipenjual();
        $notifikasipenjual->keterangan_penjual = 'Ada pesanan baru!';
        $notifikasipenjual->isi_penjual = 'Cek halaman pesanan untuk informasi lebih lanjut';
        $notifikasipenjual->toko_id_notifikasi = $toko_id;
        $notifikasipenjual->save();

        $adminnotifikasi = adminnotifikasi::where('id', $id)->first();

        if ($adminnotifikasi) {
            $adminnotifikasi->keterangan_admin = 'pesanan berhasil di konfirmasi';
            $adminnotifikasi->isi_admin = 'pesanan akan disampaikan ke penjual';
            $adminnotifikasi->is_read = false;
            $adminnotifikasi->save();

            // Menyamakan created_at dengan updated_at
            $adminnotifikasi->touch();
        }

        // notifikasipenjual::create($notifikasi_penjual);
        return redirect()->back()->with('success', 'Pesanan berhasil diterima');
    }


    public function tolak($id)
    {
        $dashboardusercontrollers = userOrder::findOrFail($id);

        // Ambil jumlah yang dibeli dalam pesanan
        $jumlahDibeli = $dashboardusercontrollers->jumlah;

        // Mengembalikan jumlah yang dibeli ke stok barangpenjual
        $barangPenjual = BarangPenjual::find($dashboardusercontrollers->barangpenjual_id);
        $barangPenjual->stok += $jumlahDibeli;
        $barangPenjual->save();

        // Menandai pesanan sebagai ditolak
        $dashboardusercontrollers->adminstatus = 'notapproveadmin';
        $dashboardusercontrollers->save();

        $notifikasi = notifikasi::where('id', $id)->first();

        if ($notifikasi) {
            $notifikasi->keterangan = 'Pesanan Anda ditolak!';
            $notifikasi->isi = 'Silahkan Chat Admin untuk mengetahui info lengkapnya.';
            $notifikasi->is_read = false;
            $notifikasi->save();
        }

        return redirect()->back();
    }

    public function calonpenjual(Request $request)
    {
        // Mengambil data penjual dengan peran "penjualnotapprove" yang terkait dengan penjuallogin
        $penjuallogin = penjuallogin::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'penjualnotapprove');
            })
            ->get();

        return view('admin.calonpenjual', compact('penjuallogin'));
    }

    public function terimapenjual(string $id)
    {
        $user = User::where('role', 'penjualnotapprove')->get();
        foreach ($user as $User) {
            Mail::to($User->email)->send(new SendEmail($User, 'terima'));
        }
        $calonPenjual = penjuallogin::where('id', $id)->first()->user_id;
        $user = User::where('id', $calonPenjual)->first();
        $user->role = 'penjual';
        $user->save();

        return redirect()->route('calonpenjual');
    }


    public function tolakpenjual($id)
    {
        try {

            $penjuallogin = PenjualLogin::findOrFail($id);
            $penjuallogin->delete();
            $user = User::findOrFail($penjuallogin->user_id);

            if ($user) {
                // dd('berhasil');
                $user = User::where('role', 'penjualnotapprove')->get();
                foreach ($user as $User) {
                    Mail::to($User->email)->send(new SendEmail($User, 'tolak'));
                    // dd('mantap');
                }
                $user->delete();
            }


            return redirect()->route('calonpenjual')
                ->with('success', 'Permintaan penjual login telah ditolak dan data terkait telah dihapus.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function calonpenjuallogin_create()
    {
        $penjuallogin = penjuallogin::all();
        return view('admin.calonpenjual', compact('penjuallogin'));
    }

    public function calonpenjual_store(Request $request)
    {
        $penjuallogin = $request->all();
        penjuallogin::create($penjuallogin);
        return redirect()->route('user.index');
    }

    public function kategori()
    {
        $admink = adminkategori::all();
        return view('admin.kategori', compact('admink'));
    }

    public function getKategoriData()
    {
        $admink = adminkategori::all();
        return response()->json($admink);
    }

    public function kcreate()
    {
        $admink = adminkategori::all();
        return view('admin.kategori', compact('admink'));
    }

    public function kstore(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'kategori' => [
                'required',
                'string',
                'max:255',
                Rule::unique('adminkategoris', 'kategori')->ignore($request->id), // Tambahkan aturan unique
            ],
            'keterangan' => 'required|string|max:255',
        ], [
            'kategori.required' => 'Nama kategori harus diisi.',
            'kategori.unique' => 'Nama kategori sudah digunakan.',
            'kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'keterangan.required' => 'Keterangan harus diisi.',
            'keterangan.max' => 'Keterangan maksimal 255',
        ]);

        try {
            // Simpan data ke dalam database
            $kategori = new adminkategori();
            $kategori->kategori = $validatedData['kategori'];
            $kategori->keterangan = $validatedData['keterangan'];
            $kategori->save();

            // Jika berhasil disimpan, kirim respons sukses
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kirim respons gagal
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data.']);
        }
    }

    public function kedit($id)
    {
        try {
            $item = adminkategori::find($id);

            if (!$item) {
                return response()->json(['success' => false, 'message' => 'Item not found'], 404);
            }

            // Kembalikan data item dalam bentuk JSON
            return response()->json(['success' => true, 'data' => $item]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to fetch item'], 500);
        }
    }

    public function aedit($id)
    {
        $metodePembayaran = adminmetodepembayaran::findOrFail($id);
        return response()->json($metodePembayaran);
    }

    public function aupdate(Request $request, $id)
    {
        // Validasi input sesuai kebutuhan Anda
        $request->validate(
            [
                'tujuan' => 'required',
                // Tambahkan validasi untuk keterangan atau keteranganFile sesuai jenisnya
                'keterangan' => $request->keteranganType === 'number' ? 'required' : 'required|image',
            ],
            [
                'tujuan.required' => 'Tujuan pembayaran wajib diisi.',
                'keterangan.required' => 'Keterangan wajib diisi.',
                'keterangan.image' => 'Keterangan harus berupa image.',
            ]
        );

        // Temukan metode pembayaran berdasarkan ID
        $metodePembayaran = adminmetodepembayaran::find($id);

        if (!$metodePembayaran) {
            return response()->json(['success' => false, 'message' => 'Metode pembayaran tidak ditemukan.'], 404);
        }

        // Simpan nama file lama untuk penghapusan
        $oldFileName = $metodePembayaran->keterangan;

        // Perbarui data metode pembayaran sesuai input
        $metodePembayaran->tujuan = $request->tujuan;

        if ($request->keteranganType === 'file') {
            $image = $request->file('keterangan');
            $filename = $image->hashName(); // Dapatkan nama hash file

            $image->storeAs('public/pembayaran', $filename);

            // Hapus file lama jika ada
            if ($oldFileName) {
                Storage::delete('public/pembayaran/' . $oldFileName);
            }

            $metodePembayaran->keterangan = $filename;
        } else {
            $metodePembayaran->keterangan = $request->keterangan;
        }

        try {
            $metodePembayaran->save();
            return response()->json(['success' => true, 'message' => 'Metode pembayaran berhasil diperbarui.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui metode pembayaran.'], 500);
        }
    }

    public function kupdate(Request $request, $id)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'kategori' => [
                'required',
                'string',
                'max:255',
                Rule::unique('adminkategoris', 'kategori')->ignore($id), // Tambahkan aturan unique
            ],
            'keterangan' => 'required|string|max:255',
        ], [
            'kategori.required' => 'Nama kategori harus diisi.',
            'kategori.unique' => 'Nama kategori sudah digunakan.',
            'kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'keterangan.required' => 'Keterangan harus diisi.',
            'keterangan.max' => 'Keterangan maksimal 255',
        ]);

        try {
            // Temukan data yang akan diupdate
            $kategori = adminkategori::findOrFail($id);

            // Perbarui data dalam database
            $kategori->kategori = $validatedData['kategori'];
            $kategori->keterangan = $validatedData['keterangan'];
            $kategori->save();

            // Jika berhasil diperbarui, kirim respons sukses
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui.']);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kirim respons gagal
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui data.']);
        }
    }

    public function kdestroy($id)
    {
        $item = adminkategori::findOrFail($id);

        // Cek apakah ada data terkait yang masih digunakan
        if ($item->penjual()->exists()) { // Ganti 'items' dengan nama relasi yang benar
            return response()->json(['success' => false, 'message' => 'Data Kategori masih digunakan.'], 422);
        }

        try {
            $item->delete();
            return response()->json(['success' => true, 'message' => 'Item berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus item.'], 500);
        }
    }

    public function pengajuanpembeliad(Request $request)
    {
        $userOrder = userOrder::where('pembelianstatus', 'mengajukan pengembalian dana')->get();
        return view('admin.pengajuanpembeliad', compact('userOrder'));
    }

    protected function pengajuanpenjualad(Request $request)
    {
        $penjual = penjuallogin::all();
        $data = pengajuandanapenjual::where('status', 'sedangMengajukan')->get();
        return view('admin.pengajuanpenjualad', compact('penjual', 'data'));
    }

    public function terimapengajuan($id)
    {
        $pengajuanPenjual = pengajuandanapenjual::findOrFail($id);
        $pengajuanPenjual->status = 'pengajuanDiterima';
        $pengajuanPenjual->save();

        return redirect()->back()->with('success', 'pengembalian dana telah di setujui');
    }


    /**
     * Show the form for creating a new resource.
     */

    public function terimapengajuanuser($id)
    {
        $user = userOrder::findOrFail($id);
        $user->pembelianstatus = 'pengembalian dana di terima';
        $user->save();
        return redirect()->back();
    }

    public function create()
    {
        $adminmp = adminmetodepembayaran::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'metodepembayaran' => 'required',
            'tujuan' => 'required',
            'keterangan' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('metodepembayaran') == 'bank') {
                        if (!is_numeric($value)) {
                            $fail('Keterangan untuk metode pembayaran bank harus berupa angka.');
                        }
                    } elseif ($request->input('metodepembayaran') == 'ewallet') {
                        if (
                            !$request->file('keterangan')->isValid() ||
                            !in_array($request->file('keterangan')->getClientOriginalExtension(), ['jpeg', 'jpg', 'png'])
                        ) {
                            $fail('Keterangan untuk metode pembayaran e-wallet harus berupa file dengan format jpeg, jpg, atau png.');
                        }
                        if ($request->file('keterangan')->getSize() > 2048) {
                            $fail('Ukuran maksimal Keterangan untuk metode pembayaran e-wallet adalah 2MB.');
                        }
                    }
                },
            ],
        ], [
            'metodepembayaran.required' => 'Metode pembayaran wajib dipilih.',
            'tujuan.required' => 'Tujuan wajib diisi.',
            'keterangan-required' => 'keterangan harus di isi',
        ]);


        $adminmp = new adminmetodepembayaran;
        $adminmp->metodepembayaran = $request->metodepembayaran;
        $adminmp->tujuan = $request->tujuan;
        $adminmp->keterangan = $request->input('keterangan');

        if ($request->file('keterangan')) {
            $image = $request->file('keterangan');
            $filename = $image->hashName();
            $image->storeAs('public/pembayaran', $filename);
            $adminmp->keterangan = $filename;
        }
        $adminmp->save();
        return back()->with('success', 'Berhasil menambah kategori');
    }




    public function adestroy(adminmetodepembayaran $adminmp)
    {
        try {
            // Hapus file terkait jika ada
            if ($adminmp->keterangan) {
                Storage::delete('public/pembayaran/' . $adminmp->keterangan);
            }

            $adminmp->delete();
            return redirect()->route('metodpembayaran')->with('success', 'Berhasil menghapus data');
        } catch (Exception $e) {
            return back()->with('error');
        }
    }
    public function adedit(Request $request, $id)
    {
        $adminmp = adminmetodepembayaran::findOrFail($id);

        $adminmp->adminmetodepembayaran = $request->input('adminmetodepembayaran');
        $adminmp->tujuan = $request->input('tujuan');
        $adminmp->keterangan = $request->input('keterangan');

        $adminmp->save();

        return redirect()->route('admin.metodpembayaran')->with('success', 'Metode pembayaran berhasil diperbarui.');
    }

    public function mpupdate(Request $request, $id)
    {

        try {
            // Temukan data yang akan diupdate
            $adminmp = adminmetodepembayaran::findOrFail($id);

            // Perbarui data dalam database
            $adminmp->adminmetodepembayaran = $request->input('adminmetodepembayaran');
            $adminmp->tujuan = $request->input('tujuan');
            $adminmp->keterangan = $request->input('keterangan');
            $adminmp->save();

            // Jika berhasil diperbarui, kirim respons sukses
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui.']);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kirim respons gagal
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui data.']);
        }
    }

    public function notifikasiadmin()
    {
        // Hitung jumlah notifikasi dari sumber data Anda, misalnya basis data
        $notificationCount = adminnotifikasi::where('is_read', false)->count(); // Contoh: Menghitung notifikasi yang belum dibaca

        return response()->json(['count' => $notificationCount]);
    }

    public function readnotifikasiadmin($id)
    {
        $notification = adminnotifikasi::find($id);

        if ($notification) {
            $notification->update(['is_read' => true]);
            return response()->json(['message' => 'Notifikasi telah dibaca']);
        }

        return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
    }
}
