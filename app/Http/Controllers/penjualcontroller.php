<?php

namespace App\Http\Controllers;

use App\Models\admink;
use App\Models\dashboardusercontrollers;
use App\Models\pembayaranpenjual;
use App\Models\penjual;
use Illuminate\Http\Request;

class penjualcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = dashboardusercontrollers::where('pembelianstatus', 'menunggu konfirmasi ')->get();
        $penjual = penjual::all();
        $adminkategori = admink::all();
        return view('DashboardPenjual.tambahmenu', compact('penjual', 'user', 'adminkategori'));
    }

    public function riwayatpenjual()
    {
        $user = dashboardusercontrollers::where('pembelianstatus' ,'selesai')->get();
        $adminkategori = admink::all();
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



    public function terimapesanan($id)
    {
        $dashboardusercontrollers =dashboardusercontrollers::findOrFail($id);
        $dashboardusercontrollers->pembelianstatus = 'sedang di proses';
        $dashboardusercontrollers->save();

        return redirect()->route('pesananpenjual');
    }

    public function tandakantelahselesai($id)
    {
        $dashboardusercontrollers = dashboardusercontrollers::findOrfail($id);
        $dashboardusercontrollers->adminstatus = 'penjualapprove';
        $dashboardusercontrollers->pembelianstatus = 'selesai';
        $dashboardusercontrollers->save();

        return redirect()->route('DashboardPenjual.index');
    }

    protected function pesananpenjual(Request $request)
    {
        $dashboardusercontrollers = dashboardusercontrollers::where('adminstatus', 'approve')->get();
        return view('DashboardPenjual.pesananpenjual', compact('dashboardusercontrollers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penjual = penjual::all();
        return view('DashboardPenjual.tambahmenu', compact('penjual'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penjual = $request->all();
        penjual::create($penjual);
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
    public function destroy(penjual $DashboardPenjual)
    {
       $DashboardPenjual ->delete();
       return redirect()->route('DashboardPenjual.index');
    }
}
