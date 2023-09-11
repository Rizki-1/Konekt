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

class penjualcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = userOrder::where('pembelianstatus', 'menunggu konfirmasi ')->get();
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
        $pembayaranpenjual = $request->all();
        pembayaranpenjual::create($pembayaranpenjual);
        return redirect()->route('pembayaranpenjual');
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
        $penjual = $request->all();
        barangpenjual::create($penjual);
        // dd($request);
        return redirect()->route('DashboardPenjual.index')->with('berhasil');
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
