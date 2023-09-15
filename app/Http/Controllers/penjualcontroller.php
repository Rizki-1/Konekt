<?php

namespace App\Http\Controllers;

use App\Models\admink;
use App\Models\adminkategori;
use App\Models\barangpenjual;
use App\Models\dashboardusercontrollers;
use App\Models\notifikasi;
use App\Models\notifikasipenjual;
use App\Models\pembayaranpenjual;
use App\Models\penjual;
use App\Models\userOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $notifikasi_penjual = notifikasipenjual::where('toko_id_notifikasi',$penjualId)->get();
        $adminkategori = adminkategori::all();
        return view('DashboardPenjual.tambahmenu', compact('penjual', 'user', 'adminkategori', 'notifikasi', 'notifikasi_penjual', 'penjualId'));
    }

    public function DashboardPenjual()
    {
        return view('DashboardPenjual.dashboardpenjual');
    }

    public function riwayatpenjual()
    {

        $user = userOrder::where('pembelianstatus' ,'selesai')->orWhere('pembelianstatus', 'pesanan di tolak')->get();
        $user = userOrder::where('pembelianstatus','selesai')->get();
        $adminkategori = adminkategori::all();
        return view('DashboardPenjual.riwayatpenjual', compact('user', 'adminkategori'));
    }

    public function pembayaranpenjual()
    {
        $pembayaranpenjual = pembayaranpenjual::all();
        return view('DashboardPenjual.pembayaran', compact('pembayaranpenjual'));
    }

    public function pembayaranpenjual_create()
    {
        $pembayaranpenjual = pembayaranpenjual::all();
        return view('DashboardPenjual.pembayaran', compact('pembayaranpenjual'));
    }

    public function pembayaranpenjual_store(Request $request)
    {
        $metodePembayaran = $request->input('metodepembayaran');
        $data = [
            'metodepembayaran' => $metodePembayaran,
        ];

        if ($metodePembayaran === 'e-wallet') {
            $data['tujuan'] = $request->input('tujuan_e_wallet');
            $data['keterangan'] = $request->input('keterangan_e_wallet');
        } elseif ($metodePembayaran === 'bank') {
            $data['tujuan'] = $request->input('tujuan_bank');
            $data['keterangan'] = $request->input('keterangan_bank');
        } else {
            session()->flash('notif.error', 'Data pembayaran tidak valid!.');
            return redirect()->route('pembayaranpenjual');
        }

        // Simpan data ke database
        PembayaranPenjual::create($data);

        // Redirect atau tampilkan pesan sukses
        session()->flash('notif.success', 'Data pembayaran berhasil disimpan.');
        return redirect()->route('pembayaranpenjual');
    }


    public function pembayaranpenjual_destroy(pembayaranpenjual $pembayaranpenjual)
    {
        $pembayaranpenjual->delete();
        return redirect()->route('pembayaranpenjual');
    }

    public function terimapesanan($id)
    {
        // $notifikasi = notifikasi::findOrFail($id);
        // $notifikasi->keterangan = 'pesanan anda sedang di proses';
        // $notifikasi->isi = 'lihat tabel pesanan untuk informasi lebih lanjut';
        // $notifikasi->save();
        $dashboardusercontrollers =userOrder::findOrFail($id);
        $dashboardusercontrollers->pembelianstatus = 'sedang di proses';
        $dashboardusercontrollers->save();

        return redirect()->route('pesananpenjual');
    }

    public function tolakpesanan($id)
    {
        $notifikasi = notifikasi::findOrFail($id);
        $notifikasi->keterangan = 'pesanan anda di tolak oleh oleh penjual';
        $notifikasi->isi = 'lihat tabel riwayat untuk informasi lebih lanjut';
        $notifikasi->save();

        $dashboardusercontrollers = userOrder::findOrFail($id);
        $dashboardusercontrollers->pembelianstatus = 'pesanan di tolak';
        $dashboardusercontrollers->save();

        return redirect()->route('pesananpenjual');
    }

    public function tandakantelahselesai($id)
    {
        // $notifikasi = notifikasi::findOrFail($id);
        // $notifikasi->keterangan = 'pesanan anda telah selesai ';
        // $notifikasi->isi = 'lihat tabel pesanan untuk informasi lebih lanjut';
        // $notifikasi->save();
        $dashboardusercontrollers = userOrder::findOrfail($id);
        $dashboardusercontrollers->adminstatus = 'penjualapprove';
        $dashboardusercontrollers->pembelianstatus = 'selesai';
        $dashboardusercontrollers->save();

        return redirect()->route('pesananpenjual');
    }

    protected function pesananpenjual(Request $request)
    {
        $penjualId = Auth::id();
        $dashboardusercontrollers = userOrder::where('adminstatus', 'approve')->get();
        $dashboardusercontrollers = userOrder::where('toko_id', $penjualId)->get();

        if ($dashboardusercontrollers)
        {
        $notifikasi_penjual =
        [
            'keterangan_penjual' => 'ada pesanan',
            'isi_penjual' => 'Cek tabel pesanan untuk informasi lebih lanjut',
            'toko_id_notifikasi' => $penjualId
        ];
         notifikasipenjual::create($notifikasi_penjual);
        }
        $notifikasi_penjual = notifikasipenjual::where('toko_id_notifikasi',$penjualId)->get();


        return view('DashboardPenjual.pesananpenjual', compact('dashboardusercontrollers', 'notifikasi_penjual'));
    }

    protected function pengajuanpenjual(Request $request)
    {
        $penjual = barangpenjual::all();
        return view('DashboardPenjual.pengajuanpenjual', compact('penjual'));
    }

    protected function pengajuandana(Request $request)
    {
        $penjual = barangpenjual::all();
        return view('DashboardPenjual.pengajuandana', compact('penjual'));
    }

    protected function profilepenjual(Request $request)
    {
        $penjual = barangpenjual::all();
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
        // Validasi input dari request dengan pesan kustom
        $validated = $request->validate([
            'namamenu' => 'required|string|max:255',
            'kategori_id' => 'required',
            'harga' => 'required|numeric|min:0',
            'fotomakanan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'namamenu.required' => 'Nama makanan wajib diisi.',
            'namamenu.string' => 'Nama makanan harus berupa teks.',
            'namamenu.max' => 'Nama makanan tidak boleh lebih dari :max karakter.',
            'kategori_id.required' => 'Kategori wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga harus minimal :min.',
            'fotomakanan.required' => 'Foto makanan wajib diunggah.',
            'fotomakanan.image' => 'Foto makanan harus berupa file gambar.',
            'fotomakanan.mimes' => 'Foto makanan harus berformat jpeg, png, jpg, atau gif.',
            'fotomakanan.max' => 'Ukuran file foto makanan tidak boleh lebih dari :max KB.',
        ]);


        if ($request->hasFile('fotomakanan')) {
            $filePath = Storage::disk('public')->put('penjual/menu', $request->file('fotomakanan'));
            $validated['fotomakanan'] = $filePath;
        }

        $penjual = [
            'namamenu' => $request->namamenu,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'fotomakanan' => $filePath,
            'toko_id' => $request->toko_id
        ];


        $create = barangpenjual::create($penjual);

        if ($create) {
            session()->flash('notif.success', 'Menu berhasil ditambahkan!');
            return redirect()->route('DashboardPenjual.index');
        }

        return abort(500);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barangPenjual = BarangPenjual::find($id);


        if (!$barangPenjual) {
            return abort(404);
        }

        if ($barangPenjual->isUsed()) {
            session()->flash('notif.error', 'Ada User yang sedang memesan menu ini!');
            return redirect()->route('DashboardPenjual.index');
        }

        Storage::disk('public')->delete($barangPenjual->fotomakanan);

        $barangPenjual->delete();

        session()->flash('notif.success', 'Berhasil menghapus menu!');
        return redirect()->route('DashboardPenjual.index');
    }

}
