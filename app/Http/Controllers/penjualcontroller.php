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
use Illuminate\Support\Facades\Storage;

class penjualcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifikasi = notifikasi::all();
        $user = userOrder::where('pembelianstatus', 'menunggu konfirmasi')->get();
        $notifikasi_penjual = notifikasipenjual::all();
        $penjual = barangpenjual::all();
        $adminkategori = adminkategori::all();
        return view('DashboardPenjual.tambahmenu', compact('penjual', 'user', 'adminkategori', 'notifikasi', 'notifikasi_penjual'));
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
            return redirect()->route('pembayaranpenjual')->with('error', 'Metode pembayaran tidak valid.');
        }

        // Simpan data ke database
        PembayaranPenjual::create($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('pembayaranpenjual')->with('success', 'Data pembayaran berhasil disimpan.');
    }
    

    public function pembayaranpenjual_destroy(pembayaranpenjual $pembayaranpenjual)
    {
        $pembayaranpenjual->delete();
        return redirect()->route('pembayaranpenjual');
    }

    public function terimapesanan($id)
    {
        $notifikasi = notifikasi::findOrFail($id);
        $notifikasi->keterangan = 'pesanan anda sedang di proses';
        $notifikasi->isi = 'lihat tabel pesanan untuk informasi lebih lanjut';
        $notifikasi->save();
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
        $notifikasi = notifikasi::findOrFail($id);
        $notifikasi->keterangan = 'pesanan anda telah selesai ';
        $notifikasi->isi = 'lihat tabel pesanan untuk informasi lebih lanjut';
        $notifikasi->save();
        $dashboardusercontrollers = userOrder::findOrfail($id);
        $dashboardusercontrollers->adminstatus = 'penjualapprove';
        $dashboardusercontrollers->pembelianstatus = 'selesai';
        $dashboardusercontrollers->save();

        return redirect()->route('DashboardPenjual.index');
    }

    protected function pesananpenjual(Request $request)
    {
        $dashboardusercontrollers = userOrder::where('adminstatus', 'approve')->get();
        return view('DashboardPenjual.pesananpenjual', compact('dashboardusercontrollers'));
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

        $create = barangpenjual::create($validated);

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
    public function destroy(barangpenjual $DashboardPenjual)
    {
       $DashboardPenjual ->delete();
       return redirect()->route('DashboardPenjual.index');
    }
}
