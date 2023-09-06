<?php

namespace App\Http\Controllers;

use App\Models\admink;
use Illuminate\Support\Str;
use App\Models\adminmp;
use App\Models\dashboardusercontrollers;
use App\Models\notifikasi;
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
        $notifikasi = notifikasi::all();
        return view('admin.pembelian', compact('dashboardusercontrollers', 'penjual', 'notifikasi'));
    }

    public function metodpembayaran()
    {
        $adminmp = adminmp::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    public function terima( $id)
    {
        $waktuKedaluwarsa = now()->addMinute(5);
        $notifikasi = notifikasi::findOrFail($id);
        $notifikasi->keterangan = 'pesanan anda telah disetujui';
        $notifikasi->isi = 'lihat pesanan anda di menu pesanan';
        $notifikasi->waktu_kadaluwarsa = $waktuKedaluwarsa;
        $notifikasi->save();
    $dashboardusercontrollers = Dashboardusercontrollers::findOrFail($id);
    $dashboardusercontrollers->adminstatus = 'approve';
    $dashboardusercontrollers->save();
    return redirect()->route('admin.index');
    }
    public function tolak()
    {

    }

    public function kategori()
    {
        $admink = admink::all();
        return view('admin.kategori', compact('admink'));
    }

    public function kcreate()
    {
        $admink = admink::all();
        return view('admin.kategori', compact('admink'));
    }

    public function kstore(Request $request)
    {
        $admink = $request->all();
        admink::create($admink);

        return redirect()->route('kategori');
    }

    public function kdestroy(admink $admink)
    {
        $admink->delete();
        return redirect()->route('kategori');
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
