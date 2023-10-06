<?php

namespace App\Http\Controllers;

use App\Models\pembayaranpenjual;
use App\Models\User;
use App\Models\admink;
use App\Models\penjual;
use App\Models\ulasan;
use App\Models\userOrder;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use App\Models\adminkategori;
use App\Models\barangpenjual;
use App\Models\notifikasipenjual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\dashboardusercontrollers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\pengajuandanapenjual;
use App\Models\penjuallogin;
use Exception;
use Ramsey\Uuid\Uuid;

class penjualcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifikasi = notifikasi::all();
        $penjualId = Auth::id();
        $penjual = barangpenjual::where('toko_id', $penjualId)->get();
        $user = userOrder::where('pembelianstatus', 'menunggu konfirmasi')->get();
        $notifikasi_penjual = notifikasipenjual::where('toko_id_notifikasi', $penjualId)->get();
        $adminkategori = adminkategori::all();
        $penjualTokoId = penjuallogin::where('user_id', $penjualId)->get();
        return view('DashboardPenjual.tambahmenu', compact('penjual', 'user', 'adminkategori', 'notifikasi', 'notifikasi_penjual', 'penjualId', 'penjualTokoId'));
    }

    public function DashboardPenjual()
    {
        $penjualId = Auth::id();
        $notifikasipenjual = notifikasipenjual::where('toko_id_notifikasi', $penjualId)
            ->where('is_read', false)
            ->get();
        $menu = barangpenjual::where('toko_id', $penjualId)->count();
        $totalpenjualan = userOrder::where('pembelianstatus', 'statusselesai')->where('toko_id', $penjualId)->count();
        $totalharga = userOrder::where('pembelianstatus', 'statusselesai')->where('toko_id', $penjualId)->sum('totalharga');
        $untung = $totalharga * 0.05;
        $user = userOrder::where('toko_id', $penjualId)->whereIn('pembelianstatus', ['statusselesai', 'pesanan di tolak', 'pesanan di batalkan'])->get();

        // $pemasukkan = $totalharga - ($untung - 0.05);
        if ($totalharga > 1) {
            $pemasukkan = $totalharga - ($untung - 0.05);
        } else {
            $pemasukkan = $totalharga - ($untung - 0.05);
        }
        $tertunda = userOrder::where('adminstatus', 'approve')->where('toko_id', $penjualId)->count();

        $data = userOrder::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(totalharga) as total')
        )
            ->whereIn('pembelianstatus', ['statusselesai'])
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('year', 'month', 'totalharga')->get();

        $processedData = [];

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::createFromDate($currentYear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');

            $color = ($currentYear == $currentYear && $month == $currentMonth) ? 'blue' : 'green';

            $processedData[$yearMonth] = [
                'month' => $yearMonth,
                'statusselesai' => 0,
                'color' => $color,
            ];
        }
        foreach ($data as $item) {

            $yearMonth = Carbon::createFromDate($item->year, $item->month, 1)->isoFormat('MMMM');

            if (isset($processedData[$yearMonth])) {
                $ini = $pemasukkan;
                $masuk = number_format($ini, 3, ',', '.');
                $processedData[$yearMonth]['statusselesai'] = $ini;
            }
        }

        $produk = barangpenjual::where('toko_id', $penjualId)->get()->filter(function ($item) {

            $item->terjual = UserOrder::where('barangpenjual_id', $item->id)
                ->where('pembelianstatus', 'statusselesai')
                ->count();
            return $item->terjual > 0;
        });

        $produk = $produk->sortByDesc('terjual')->take(3);

        $produkRating = barangpenjual::with('ulasan')->where('toko_id', $penjualId)->get();
        $produkRating->each(function ($item) {
            $item->jumlahUlasan = $item->ulasan->avg('rating');

            return $item->jumlahUlasan > 0;
        });

        $produkRating = $produkRating->sortByDesc('jumlahUlasan');

        $produkRating = $produkRating->take(5);


        $chartData = array_values($processedData);
        return view('DashboardPenjual.dashboardpenjual', compact('menu', 'totalpenjualan', 'pemasukkan', 'tertunda', 'chartData', 'notifikasipenjual', 'produk', 'user', 'produkRating'));
    }

    public function riwayatpenjual()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('toko_id', $penjualId)->whereIn('pembelianstatus', ['statusselesai', 'pesanan di tolak', 'pesanan di batalkan'])->get();
        foreach ($user as $User) {
            $rating = ulasan::where('barangpenjual_id', $User->barangpenjual_id)->get();
        }
        $adminkategori = adminkategori::all();
        return view('DashboardPenjual.riwayatpenjual', compact('user', 'adminkategori'));
    }


    public function pembayaranpenjual()
    {
        $pembayaranpenjual = pembayaranpenjual::all();
        return view('DashboardPenjual.pembayaran', compact('pembayaranpenjual'));
    }

    public function pembayaranpenjual_store(Request $request)
    {
        // $request->validate([
        //     'metodepembayaran' => 'required',
        //     'tujuan_e_wallet' => 'required_if:metodepembayaran,e-wallet',
        //     'keterangan' => 'required',
        //     'tujuan_bank' => 'required_if:metodepembayaran,bank',
        //     'keterangan_bank' => 'required_if:metodepembayaran,bank',
        //     'keterangan_e_wallet' => 'required_if:metodepembayaran,e-wallet|file|mimes:jpeg,jpg,png|max:2048',
        // ], [
        //     'metodepembayaran.required' => 'Metode pembayaran wajib dipilih.',
        //     'tujuan_e_wallet.required_if' => 'Tujuan E-Wallet wajib diisi.',
        //     'keterangan.required' => 'Keterangan wajib diisi.',
        //     'tujuan_bank.required_if' => 'Tujuan Bank wajib diisi.',
        //     'keterangan_bank.required_if' => 'Keterangan Bank wajib diisi.',
        //     'keterangan_e_wallet.required_if' => 'Keterangan E-Wallet wajib diisi.',
        //     'keterangan_e_wallet.file' => 'Keterangan E-Wallet harus berupa file.',
        //     'keterangan_e_wallet.mimes' => 'Keterangan E-Wallet harus berupa file dengan format jpeg, jpg, atau png.',
        //     'keterangan_e_wallet.max' => 'Ukuran maksimal Keterangan E-Wallet adalah 2MB.',
        // ]);

        $metodePembayaran = $request->input('metodepembayaran');
        $data = [
            'metodepembayaran' => $metodePembayaran,
        ];

        if ($metodePembayaran === 'e-wallet') {
            $data['tujuan'] = $request->input('tujuan_e_wallet');
            $data['keterangan'] = $request->input('keterangan_e_wallet');

            if ($request->hasFile('keterangan_e_wallet')) {
                $image = $request->file('keterangan_e_wallet');
                $file = $image->hashName();
                $image->storeAs('public/pembayaran', $file);
                $data['keterangan'] = $file;
            }
        } elseif ($metodePembayaran === 'bank') {
            $data['tujuan'] = $request->input('tujuan_bank');
            $data['keterangan'] = $request->input('keterangan_bank');
        } else {
            session()->flash('notif.error', 'Data pembayaran tidak valid!');
            return redirect()->route('pembayaranpenjual');
        }
        pembayaranpenjual::create($data);
        session()->flash('notif.success', 'Data pembayaran berhasil disimpan.');
        return redirect()->route('pembayaranpenjual');
    }

    public function pembayaranedit()
    {
        $pembayaranpenjual = pembayaranpenjual::all();
        return view('DashboardPenjual.pembayaran', compact('pembayaranpenjual'));
    }

    public function pembayaranupdate(Request $request, $id)
    {
        $data = pembayaranpenjual::findOrFail($id);
        $data->tujuan = $request->tujuan;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->back()->with('succes', 'berhasil mengubah');
    }

    public function pembayaranpenjual_destroy(Pembayaranpenjual $pembayaranpenjual)
    {
        // $pembayaranpenjual->delete();
        // return redirect()->route('pembayaranpenjual');
        try {
            $pembayaranpenjual->delete();
            return redirect()->route('pembayaranpenjual')->with('success', 'berhasil dihapus');
        } catch (Exception $e) {
            return back()->with('error', 'data masih digunakan');
        }
    }

    public function detailmenupen(Request $request, $id)
    {
        $user = BarangPenjual::findOrFail($id);
        $penjual = BarangPenjual::where('id', $id)->get();
        $ulasan = ulasan::where('barangpenjual_id', $id)->get();
        // $penjual = BarangPenjual::all();

        return view('DashboardPenjual.detailmenupen', compact('user', 'penjual', 'ulasan'));
    }

    public function terimapesanan(Request $request, $id)
    {
        try {
            $request->validate([
                'nomor_antrian' => 'required',
            ], [
                'nomor_antrian.required' => 'Nomor Antrian wajib di isi'
            ]);

            $dashboardusercontroller = userOrder::findOrFail($id);
            $dashboardusercontroller->pembelianstatus = 'sedang di proses';
            $dashboardusercontroller->nomor_antrian = $request->nomor_antrian;
            $dashboardusercontroller->save();

            // Tambahkan notifikasi kepada pembeli di sini jika diperlukan

            return redirect()->route('pesananpenjual')->with('success', 'Status pesanan berhasil diubah.');
        } catch (\Exception $e) {
            // Handle error jika terjadi kesalahan saat mengubah status pesanan
            return redirect()->route('pesananpenjual')->with('error', 'Tolong beri nomor antrian!');
        }
    }


    public function tolakpesanan($id)
    {
        $userOrder = userOrder::findOrFail($id);
        $userOrder->pembelianstatus = 'pesanan di tolak';
        $userOrder->save();

        // Ambil jumlah yang dibeli dalam pesanan
        $jumlahDibeli = $userOrder->jumlah;

        // Mengembalikan jumlah yang dibeli ke stok barangpenjual
        $barangPenjual = BarangPenjual::find($userOrder->barangpenjual_id);
        $barangPenjual->stok += $jumlahDibeli;
        $barangPenjual->save();

        return redirect()->route('pesananpenjual');
    }

    public function tandakantelahselesai($id)
    {
        $dashboardusercontrollers = userOrder::findOrfail($id);
        $dashboardusercontrollers->adminstatus = 'penjualapprove';
        $dashboardusercontrollers->pembelianstatus = 'selesai';
        $dashboardusercontrollers->update();

        // $notifikasi = notifikasi::where('id', $id)->get();
        // $notifikasi->keterangan = 'Pesanan Anda telah selesai.';
        // $notifikasi->isi = 'Lihat halaman pesanan untuk informasi lebih lanjut';
        // $notifikasi->is_read = false;
        // $notifikasi->save();

        return redirect()->route('pesananpenjual');
    }

    public function pesananpenjual(Request $request)
    {
        $penjualId = Auth::id();
        $userOrder = userOrder::all();

        $dashboardusercontrollers = userOrder::where('adminstatus', 'approve')
            ->where('toko_id', $penjualId)
            ->whereIn('pembelianstatus', ['menunggu konfirmasi', 'sedang di proses'])
            ->get();

        $notifikasi_penjual = notifikasipenjual::where('toko_id_notifikasi', $penjualId)->get();
        $url = '';
        foreach ($dashboardusercontrollers as $user) {
            $url = url('/chatify/' . $user->user_id);
        }


        return view('DashboardPenjual.pesananpenjual', compact('dashboardusercontrollers', 'notifikasi_penjual', 'url'));
    }


    protected function pengajuandana(Request $request)
    {
        $penjualId = Auth::id();
        $pengajuan = pengajuandanapenjual::whereIn('status', ['siapMengajukan', 'sedangMengajukan'])->get();
        // $pengajuan = pengajuandanapenjual::where('status', 'siapMengajukan')->get();
        // $pengajuandanapenjual = penjuallogin::all();
        $pengajuandanapenjual = penjuallogin::where('user_id', $penjualId)->get();

        $bank = pembayaranpenjual::where('metodepembayaran', 'bank')->get();
        $wallet = pembayaranpenjual::where('metodepembayaran', 'e-wallet')->get();
        // dd($userOrder);
        return view('DashboardPenjual.pengajuandana', compact('pengajuandanapenjual', 'bank', 'wallet', 'pengajuan', 'penjualId'));
    }

    protected function mengajukandana(Request $request, $id)
    {
        $mengajukan = pengajuandanapenjual::findOrFail($id);
        $mengajukan->penjual_id = $request->penjual_id;
        $mengajukan->status = 'sedangMengajukan';
        $mengajukan->metodepembayaran_id = $request->metodepembayaran_id;
        $mengajukan->keterangan_pengajuan = $request->input('keterangan_bank', 'keterangan_e_wallet');
        $mengajukan->tujuan_pengajuan = $request->input('tujuan_bank', 'tujuan_e_wallet');
        $mengajukan->save();
        // dd($mengajukan);
        return redirect()->route('pengajuanpenjualad');
    }




    protected function profilepenjual(Request $request)
    {
        $penjualId = Auth::id();
        $penjual = barangpenjual::where('toko_id', $penjualId)->get();
        return view('DashboardPenjual.profilepenjual', compact('penjual'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penjual = barangpenjual::all();
        return view('DashboardPenjual.tambahmenu', compact('penjual'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $penjualId = Auth::id();
        $validated = $request->validate([
            'namamenu' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
            'kategori_id' => 'required|exists:adminkategoris,id',
            'harga' => 'required|numeric|min:0',
            'fotomakanan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stok' => 'required|numeric|min:0',
            'keterangan_makanan' => 'required|max:255',
        ], [
            'namamenu.required' => 'Nama makanan wajib diisi.',
            'namamenu.string' => 'Nama makanan harus berupa teks.',
            'namamenu.max' => 'Nama makanan tidak boleh lebih dari :max karakter.',
            'namamenu.regex' => 'Nama makanan tidak boleh diisi angka.',
            'kategori_id.required' => 'Kategori wajib diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh minus.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.numeric' => 'Stok harus berupa angka.',
            'stok.min' => 'Stok tidak boleh minus.',
            'fotomakanan.required' => 'Foto makanan wajib diunggah.',
            'fotomakanan.image' => 'Foto makanan harus berupa file gambar.',
            'fotomakanan.mimes' => 'Foto makanan harus berformat jpeg, png, jpg, atau gif.',
            'fotomakanan.max' => 'Ukuran file foto makanan tidak boleh lebih dari :max KB.',
            'keterangan_makanan.required' => 'keterangan makanan tidak boleh kosong',
            'ketrangan_makanan.max' => 'Keterangan makanan maximal 255',
        ]);


        if ($validated) {
            // Simpan foto makanan ke penyimpanan
            if ($request->hasFile('fotomakanan')) {
                $filePath = $request->file('fotomakanan')->store('penjual/menu', 'public');
            } else {
                return response()->json(['success' => false, 'message' => 'Foto makanan tidak ditemukan.'], 422);
            }

            // Buat data untuk disimpan dalam database
            $penjual = [
                'namamenu' => $request->namamenu,
                'keterangan_makanan' => $request->keterangan_makanan,
                'kategori_id' => $request->kategori_id,
                'nama_toko' => $request->nama_toko,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'fotomakanan' => $filePath,
                'toko_id' => $penjualId,
            ];

            // Simpan data ke database
            $create = BarangPenjual::create($penjual);

            if ($create) {
                return response()->json(['success' => true, 'message' => 'Menu berhasil ditambahkan!']);
            } else {
                return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menambahkan menu.'], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'Validasi gagal.'], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            // Cari item dengan ID tertentu
            $item = BarangPenjual::find($id);

            if (!$item) {
                return response()->json(['success' => false, 'message' => 'Item not found'], 404);
            }

            // Kembalikan data item dalam bentuk JSON
            return response()->json(['success' => true, 'data' => $item]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to fetch item'], 500);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari request dengan pesan kustom
        $validated = $request->validate([
            'namamenu' => 'required|string|max:255|regex:/^[A-Za-z\s]+$/',
            'kategori_id' => 'required|exists:adminkategoris,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'fotomakanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'keterangan_makanan' => 'required',
        ], [
            'namamenu.required' => 'Nama makanan wajib diisi.',
            'namamenu.string' => 'Nama makanan harus berupa teks.',
            'namamenu.max' => 'Nama makanan tidak boleh lebih dari :max karakter.',
            'namamenu.regex' => 'Nama makanan tidak boleh diisi angka.',
            'kategori_id.required' => 'Kategori wajib diisi.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga harus minimal :min.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.numeric' => 'Stok harus berupa angka.',
            'stok.min' => 'Stok harus minimal :min.',
            'fotomakanan.image' => 'Foto makanan harus berupa file gambar.',
            'fotomakanan.mimes' => 'Foto makanan harus berformat jpeg, png, jpg, atau gif.',
            'fotomakanan.max' => 'Ukuran file foto makanan tidak boleh lebih dari :max KB.',
            'keterangan_makanan.required' => 'keterangan makanan tidak boleh kosong',
        ]);

        if ($validated) {
            // Temukan item yang akan diubah berdasarkan ID
            $item = barangpenjual::find($id);

            if (!$item) {
                return response()->json(['success' => false, 'message' => 'Item tidak ditemukan.'], 404);
            }

            // Perbarui nilai-nilai atribut item sesuai dengan input
            $item->namamenu = $request->namamenu;
            $item->kategori_id = $request->kategori_id;
            $item->harga = $request->harga;
            $item->stok = $request->stok;
            $item->keterangan_makanan = $request->keterangan_makanan;

            // Jika ada file gambar yang diunggah, simpan gambar baru
            if ($request->hasFile('fotomakanan')) {
                // Hapus file gambar sebelumnya jika ada
                if (Storage::disk('public')->exists($item->fotomakanan)) {
                    Storage::disk('public')->delete($item->fotomakanan);
                }

                $filePath = $request->file('fotomakanan')->store('penjual/menu', 'public');
                $item->fotomakanan = $filePath;
            }

            // Simpan perubahan ke database
            if ($item->save()) {
                return response()->json(['success' => true, 'message' => 'Item berhasil diperbarui.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan perubahan.'], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'Validasi gagal.'], 422);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barangPenjual = BarangPenjual::find($id);

        if (!$barangPenjual) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan.'
            ], 404);
        }

        if ($barangPenjual->isUsed()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada pengguna yang memesan menu ini.'
            ], 422);
        }

        Storage::disk('public')->delete($barangPenjual->fotomakanan);

        $barangPenjual->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil dihapus.'
        ]);
    }

    public function notifikasipenjual()
    {

        $user = Auth::id();
        // Hitung jumlah notifikasi dari sumber data Anda, misalnya basis data
        $notificationCount = notifikasipenjual::where('toko_id_notifikasi', $user)
            ->where('is_read', false)
            ->count(); // Contoh: Menghitung notifikasi yang belum dibaca
        return response()->json(['count' => $notificationCount]);
    }

    public function readnotifikasipenjual($id)
    {
        $notification = notifikasipenjual::find($id);

        if ($notification) {
            $notification->update(['is_read' => true]);
            return response()->json(['message' => 'Notifikasi telah dibaca']);
        } else {
            return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
        }
    }
}
