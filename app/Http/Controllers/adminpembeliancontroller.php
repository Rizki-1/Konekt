<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\userOrder;
use App\Models\notifikasi;
use Illuminate\Support\Str;
use App\Models\penjuallogin;
use Illuminate\Http\Request;
use App\Models\adminkategori;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\notifikasipenjual;
use App\Models\adminmetodepembayaran;

class adminpembeliancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboardusercontrollers = userOrder::where('adminstatus', 'notapprove')->get();
        $penjual = barangpenjual::all();
        $adminnotifikasi = adminnotifikasi::all();
        $notifikasi_penjual = notifikasipenjual::all();
        $notifikasi = notifikasi::all();
        return view('admin.pembelian', compact('dashboardusercontrollers', 'penjual', 'notifikasi', 'notifikasi_penjual', 'adminnotifikasi'));
    }

    public function metodpembayaran()
    {
        $adminmp = adminmetodepembayaran::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    public function DashboardAdmin()
    {
        $adminnotifikasi = adminnotifikasi::all();
        $totalpengguna = penjuallogin::count();
        $totaluser = User::where('role', 'user')->count();
        $totalpembelian = userOrder::where('pembelianstatus', 'statusselesai')->count();
        $totalharga = userOrder::where('adminstatus', 'approve')->sum('totalharga');
        $untung = $totalharga * 0.05;
        return view('admin.dashboard', compact('adminnotifikasi', 'totalpengguna', 'totaluser', 'totalpembelian', 'untung'));
    }

    public function terima($id)
{
    $dashboardusercontrollers = userOrder::find($id);

    if (!$dashboardusercontrollers) {
        // Tindakan yang harus diambil jika ID tidak ditemukan
        return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
    }

    $dashboardusercontrollers->adminstatus = 'approve';
    $dashboardusercontrollers->save();

    $adminnotifikasi = adminnotifikasi::where('id', $id)->first();

    if ($adminnotifikasi) {
        $adminnotifikasi->keterangan_admin = 'pesanan berhasil di konfirmasi';
        $adminnotifikasi->isi_admin = 'pesanan akan disampaikan ke penjual';
        $adminnotifikasi->save();
    }

    // $notifikasi_penjual = [
    //     'keterangan_penjual' => 'ada pesanan',
    //     'isi_penjual' => 'Cek tabel pesanan untuk informasi lebih lanjut'
    // ];

    // notifikasipenjual::create($notifikasi_penjual);
    return redirect()->back()->with('success', 'Pesanan berhasil diterima');
}


    public function tolak($id)
    {
        $dashboardusercontrollers = userOrder::findOrFail($id);
        $dashboardusercontrollers->adminstatus = 'notapprove';
        $dashboardusercontrollers->save();

        $notifikasi = notifikasi::FindOrFail($id);
        $notifikasi->keterangan = 'pesanan anda di tolak ';
        $notifikasi->isi = 'periksa tabel pesanan anda untuk konfirmasi';
        $notifikasi->save();

        return redirect()->back();
    }

    public function calonpenjual(Request $request)
        {
    // Mengambil data penjual dengan peran "penjualnotapprove" yang terkait dengan penjuallogin
    $penjuallogin = penjuallogin::with('user')
        ->whereHas('user', function ($query) {
            $query->where('role', 'penjualnotapprove');
        })
        ->get();

    return view('admin.calonpenjual', compact('penjuallogin'));
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

    public function tolakpenjual($id)
    {
        try {
            // Temukan entitas penjuallogin yang akan ditolak
            $penjuallogin = PenjualLogin::findOrFail($id);

            // Hapus data penjuallogin
            $penjuallogin->delete();

            // Hapus data user yang terkait
            $user = User::find($penjuallogin->user_id);
            if ($user) {
                $user->delete();
            }

            // Redirect atau kirim pesan sukses ke admin
            return redirect()->route('calonpenjual')
                ->with('success', 'Permintaan penjual login telah ditolak dan data terkait telah dihapus.');
        } catch (\Exception $e) {
            // Redirect dengan pesan kesalahan ke halaman sebelumnya
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        $admink = adminkategori::all();
        return view('admin.kategori', compact('admink'));
    }

    public function kcreate()
    {
        $admink = adminkategori::all();
        return view('admin.kategori', compact('admink'));
    }

    public function kstore(Request $request)
    {
        $admink = $request->all();
        adminkategori::create($admink);

        return redirect()->route('kategori');
    }

    public function kdestroy(adminkategori $admink)
    {
        try {
            $admink->delete();
            return redirect()->route('kategori');
        } catch (Exception $e) {
            return back()->with('error','data masih terhubung');

        }
    }

    protected function pengajuanpembeliad(Request $request)
    {
        $user = User::all();
        return view('admin.pengajuanpembeliad', compact('user'));
    }

    protected function pengajuanpenjualad(Request $request)
    {
        $penjual = barangpenjual::all();
        return view('admin.pengajuanpenjualad', compact('penjual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adminmp = adminmetodepembayaran::all();
        return view('admin.metodpembayaran', compact('adminmp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   // dd($request->all());
        $adminmp = new adminmetodepembayaran;
        $adminmp->metodepembayaran = $request->metodepembayaran;
        $adminmp->tujuan = $request->tujuan;
        $adminmp->keterangan = $request->input('keterangan');

        if ($request->file('keterangan')) {
            $image = $request->file('keterangan');
            $filename = $image->hashName();
            $image->storeAs('public/pembayaran', $filename);
            $adminmp->keterangan = $filename;
        }
        $adminmp->save();
        return back();
    }
    // public function store(Request $request){
    //     // dd($request->all());
    //     $metodepembayaran = $request->input('metodepembayaran');
    //     $adminmp = [
    //         'metodepembayaran' => $metodepembayaran,
    //     ];

    //     if($metodepembayaran === 'e_wallet'){
    //         // $request->file('keterangan');
    //         $adminmp['tujuan'] = $request->input('tujuan');
    //         $adminmp['keterangan'] = $request->input('keterangan');
    //         $image = $request->file('keterangan');
    //         $filename = $image->hashName();
    //         $image->storeAs('public/pembayaran',$filename);
    //         $adminmp['keterangan'] = $filename;
    //     }elseif ($metodepembayaran === 'bank') {
    //         $adminmp['tujuan'] = $request->input('tujuan');
    //         $adminmp['keterangan'] = $request->input('keterangan');
    //     }else {
    //         session()->flash('notif.error', 'Data pembayaran tidak valid !');
    //         // return back();
    //     }
    //     adminmetodepembayaran::create($adminmp);

    //     session()->flash('notif.success','Data Berhasil di simpan');
    //     return back();

    // }

    public function adestroy(adminmetodepembayaran $adminmp)
    {
      try{
        $adminmp->delete();
        return redirect()->route('metodpembayaran');
      }catch (Exception $e){
        return back()->with('error');
      }
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
