<?php

namespace App\Http\Controllers;

use App\Models\adminmp;
use App\Models\dashboardusercontrollers;
use App\Models\penjual;
use Illuminate\Http\Request;

class adminpembeliancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboardusercontrollers = dashboardusercontrollers::where('adminstatus', 'notapprove')->get();
        $penjual = penjual::all();
        return view('admin.pembelian', compact('dashboardusercontrollers', 'penjual'));
    }

    public function metodpembayaran()
    {
        $adminmp = adminmp::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    public function terima( $id)
    {
         // Temukan data dengan ID tertentu
    $dashboardusercontrollers = Dashboardusercontrollers::findOrFail($id);

    // Ubah status 'adminstatus' menjadi 'approve'
    $dashboardusercontrollers->adminstatus = 'approve';

    // Simpan perubahan
    $dashboardusercontrollers->save();

    // Redirect atau berikan respons sesuai kebutuhan Anda
    return redirect()->route('admin.index');
    }
    public function tolak()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adminmp = adminmp::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $adminmp = $request->all();
        adminmp::create($adminmp);
        return redirect()->route('metodpembayaran');
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
        //
    }
}
