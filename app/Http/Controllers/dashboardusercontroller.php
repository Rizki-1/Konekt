<?php

namespace App\Http\Controllers;

use App\Models\userOrder;
use App\Models\notifikasi;
use App\Models\adminnotifikasi;
use App\Models\notifikasipenjual;

use App\Models\barangpenjual;
use Illuminate\Http\Request;

class dashboardusercontroller extends Controller
{
    // protected $penjual;

    // public function __construct()
    // {
    //     $this->penjual = barangpenjual::all();
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = userOrder::all();
        $notifikasi = notifikasi::all();
        $penjual =  barangpenjual::all();
        $adminnotifikasi = adminnotifikasi::all();
        $waktuKadaluwarsa = notifikasi::all();

        return view('DashboardUser.menu', compact('penjual', 'users', 'notifikasi', 'waktuKadaluwarsa', 'adminnotifikasi' ));
    }

    public function pembelian(Request $request)
    {
        $penjual = penjual::all();
        return view('DashboardUser.pembelian', compact('penjual'));
    }


    public function pesanan()
    {
        $user = userOrder::where('adminstatus', 'approve')->get();
        $penjual = barangpenjual::all();
        return view('DashboardUser.pesanan', compact('user', 'penjual'));
    }

    public function riwayatuser()
    {
        $user = userOrder::where('pembelianstatus', 'selesai')->orWhere('pembelianstatus', 'pesanan di tolak')->get();
        $penjual = barangpenjual::all();
        return view('DashboardUser.riwayat', compact('user', 'penjual'));
    }

    public function Userkeranjang()
    {
        $user = userOrder::all();
        return view('DashboardUser.keranjang', compact('user'));
    }

    public function pengajuanuser()
    {
        $user = dashboardusercontrollers::all();
        return view('DashboardUser.pengajuanuser', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dashboardusercontrollers = userOrder::all();
        $penjual = barangpenjual::all();
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
            'adminstatus'=> 'notapprove',
            'pembelianstatus'=> 'menunggu konfirmasi',

        ];
        $adminnotifikasi =  [
            'keterangan_admin' => 'ada pesanan  masuk',
            'isi_admin' => 'cek tabel pembelian untuk konfirmasi'
        ];
        $notifikasi = [
            'keterangan' => 'anda berhasil membuat pesanan',
            'isi' => 'lihat pesanan anda di menu pesanan',
        ];
        adminnotifikasi::create($adminnotifikasi);
        notifikasi::create($notifikasi);
        userOrder::create($dashboardusercontrollers);
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
