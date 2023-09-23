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

class adminpembeliancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboardusercontrollers = userOrder::where('adminstatus', 'notapprove')->get();
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
        $adminnotifikasi = adminnotifikasi::all();
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
->groupBy('year', 'month', 'pembelianstatus')
->get();

$processedData = [];

$currentYear = Carbon::now()->year; // Tahun saat ini
$currentMonth = Carbon::now()->month; // Bulan saat ini

for ($month = 1; $month <= 12; $month++) {
    $date = Carbon::createFromDate($currentYear, $month, 1); // Membuat objek Carbon dari tahun dan bulan
    $yearMonth = $date->isoFormat('MMMM'); // Format bulan menjadi nama bulan dalam bahasa Inggris

    $color = ($currentYear == $currentYear && $month == $currentMonth) ? 'blue' : 'green'; // Beri warna biru untuk bulan saat ini, jika bukan bulan saat ini, beri warna hijau

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

        return view('admin.dashboard', compact('adminnotifikasi', 'totalpengguna', 'totaluser', 'totalpembelian', 'untung','chartData'));
    }

    public function terima($id)
{
    $dashboardusercontrollers = userOrder::find($id);

    if (!$dashboardusercontrollers) {
        // Tindakan yang harus diambil jika ID tidak ditemukan
        return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
    }

    $dashboardusercontrollers->adminstatus = 'approve';
    $dashboardusercontrollers->save();

    $adminnotifikasi = adminnotifikasi::where('id', $id)->first();

    if ($adminnotifikasi) {
        $adminnotifikasi->keterangan_admin = 'pesanan berhasil di konfirmasi';
        $adminnotifikasi->isi_admin = 'pesanan akan disampaikan ke penjual';
        $adminnotifikasi->save();
    }

    // $notifikasi_penjual = [
    //     'keterangan_penjual' => 'ada pesanan',
    //     'isi_penjual' => 'Cek tabel pesanan untuk informasi lebih lanjut'
    // ];

    // notifikasipenjual::create($notifikasi_penjual);
    return redirect()->back()->with('success', 'Pesanan berhasil diterima');
}


    public function tolak($id)
    {
        $dashboardusercontrollers = userOrder::findOrFail($id);
        $dashboardusercontrollers->adminstatus = 'notapproveadmin';
        $dashboardusercontrollers->save();

        // $notifikasi = notifikasi::FindOrFail($id);
        // $notifikasi->keterangan = 'pesanan anda di tolak ';
        // $notifikasi->isi = 'periksa tabel pesanan anda untuk konfirmasi';
        // $notifikasi->save();

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
            Mail::to($User->email)->send(new SendEmail($User));
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
            $user = User::find($penjuallogin->user_id);
            if ($user) {
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
            'keterangan' => 'required|string',
        ], [
            'kategori.required' => 'Nama kategori harus diisi.',
            'kategori.unique' => 'Nama kategori sudah digunakan.',
            'kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'keterangan.required' => 'Keterangan harus diisi.',
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
            'keterangan' => 'required|string',
        ], [
            'kategori.required' => 'Nama kategori harus diisi.',
            'kategori.unique' => 'Nama kategori sudah digunakan.',
            'kategori.max' => 'Nama kategori maksimal 255 karakter.',
            'keterangan.required' => 'Keterangan harus diisi.',
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
        $userOrder = userOrder::where('pembelianstatus', 'mengajukan pengembalian')->get();
        return view('admin.pengajuanpembeliad', compact('userOrder'));
    }


    protected function pengajuanpenjualad(Request $request)
    {
        $penjual = barangpenjual::all();
        return view('admin.pengajuanpenjualad', compact('penjual'));
    }

    public function terimapengajuan($id)
    {
        $userOrder = userOrder::findOrFail($id);
        $userOrder->pembelianstatus = 'pengembalian dana di terima';
        $userOrder->save();

        return redirect()->back()->with('success', 'pengembalian dana telah di setujui');
    }

    /**
     * Show the form for creating a new resource.
     */
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
        'keterangan' => 'required|file|mimes:jpeg,jpg,png|max:2048',
    ], [
        'metodepembayaran.required' => 'Metode pembayaran wajib dipilih.',
        'tujuan.required' => 'Tujuan wajib diisi.',
        'keterangan.required' => 'Keterangan wajib diisi.',
        'keterangan.file' => 'Keterangan harus berupa file.',
        'keterangan.mimes' => 'Keterangan harus berupa file dengan format jpeg, jpg, atau png.',
        'keterangan.max' => 'Ukuran maksimal Keterangan adalah 2MB.',
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
    return back();
}


    public function adestroy(adminmetodepembayaran $adminmp)
    {
      try{
        $adminmp->delete();
        return redirect()->route('metodpembayaran');
      }catch (Exception $e){
        return back()->with('error');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
