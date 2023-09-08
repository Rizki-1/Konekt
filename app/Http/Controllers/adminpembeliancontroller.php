<?php

namespace App\Http\Controllers;

use App\Models\admink;
use Illuminate\Support\Str;
use App\Models\adminmp;
use App\Models\adminnotifikasi;
use App\Models\dashboardusercontrollers;
use App\Models\notifikasi;
use App\Models\notifikasipenjual;
use App\Models\penjual;
use App\Models\penjuallogin;
use App\Models\User;
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
        $adminnotifikasi = adminnotifikasi::all();
        $notifikasi_penjual = notifikasipenjual::all();
        $notifikasi = notifikasi::all();
        return view('admin.pembelian', compact('dashboardusercontrollers', 'penjual', 'notifikasi', 'notifikasi_penjual', 'adminnotifikasi'));
    }

    public function metodpembayaran()
    {
        $adminmp = adminmp::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    public function DashboardAdmin()
    {
        $adminnotifikasi = adminnotifikasi::all();
        return view('admin.dashboard', compact('adminnotifikasi'));
    }

    public function terima($id)
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

        $adminnotifikasi = adminnotifikasi::findOrFail($id);
        $adminnotifikasi->keterangan_admin = 'pesanan berhasil di konfirmasi';
        $adminnotifikasi->isi_admin = 'pesanan akan di sampaikan ke penjual';
        $adminnotifikasi->save();

        $notifikasi_penjual =
            [
                'keterangan_penjual' => 'ada pesanan',
                'isi_penjual' => 'Cek tabel pesanan untuk informasi lebih lanjut'
            ];
        notifikasipenjual::create($notifikasi_penjual);
        return redirect()->route('admin.index');
    }
    public function tolak($id)
    {
        $dashboardusercontrollers = dashboardusercontrollers::findOrFail($id);
        $dashboardusercontrollers->adminstatus = 'notapprove';
        $dashboardusercontrollers->save();

        $notifikasi = notifikasi::FindOrFail($id);
        $notifikasi->keterangan = 'pesanan anda di tolak ';
        $notifikasi->isi = 'periksa tabel pesanan anda untuk konfirmasi';
        $notifikasi->save();

        return redirect()->back();
    }

    public function terimapenjual(string $id)
    {
        // $user = User::FindOrFail($id);
        $calonPenjual = penjuallogin::where('id', $id)->first()->user_id;
        $user = User::where('id', $calonPenjual)->first();
        $user->role = 'penjual';
        $user->save();
       
        // dd($user->name);
        return redirect()->route('calonpenjual');
    }

    public function calonpenjual(Request $request)
    {
        $penjuallogin = penjuallogin::with('user')->get();
        $user = User::all();
        return view('admin.calonpenjual', compact('penjuallogin', 'user'));
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
