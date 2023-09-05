<?php

namespace App\Http\Controllers;

use App\Models\dashboardusercontrollers;
use App\Models\penjual;
use Illuminate\Http\Request;

class dashboardusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjual = penjual::all();
        return view('DashboardUser.menu', compact('penjual'));
    }

    public function pembelian()
    {
        $penjual = penjual::all();
        return view('DashboardUser.pembelian', compact('penjual'));
    }

    public function pesanan()
    {
        $user = dashboardusercontrollers::where('adminstatus', 'approve')->get();
        $penjual = penjual::all();
        return view('DashboardUser.pesanan', compact('user', 'penjual'));
    }

    public function riwayatuser()
    {
        $user = dashboardusercontrollers::where('pembelianstatus', 'selesai')->get();
        $penjual = penjual::all();
        return view('DashboardUser.riwayat', compact('user', 'penjual'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dashboardusercontrollers = dashboardusercontrollers::all();
        $penjual = penjual::all();
        return view('DashboardUser.pembelian', compact('dashboardusercontrollers','penjual'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $dashboardusercontrollers =
        [
            'namamenu_id' => $request->namamenu_id,
            'quantity'=> $request->quantity,
            'fotobukti'=> $request->fotobukti,
            'totalharga'=> $request->totalharga,
            'adminstatus'=> 'notapprove',
            'pembelianstatus'=> 'menunggu konfirmasi'
        ];
        dashboardusercontrollers::create($dashboardusercontrollers);
        return redirect()->route('menu.index');
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
    public function destroy(string $id)
    {

    }
}
