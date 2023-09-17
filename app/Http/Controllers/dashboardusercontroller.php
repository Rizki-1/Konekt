<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ulasan;
use App\Models\Pembelian;
use App\Models\adminmetodepembayaran;
use App\Models\userOrder;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\notifikasipenjual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\penjuallogin;

class dashboardusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualId = Auth::id();
        $users = userOrder::all();
        $notifikasi = notifikasi::where('user_id_notifikasi', $penjualId);
        $penjual =  barangpenjual::all();
        $adminnotifikasi = adminnotifikasi::all();
        $waktuKadaluwarsa = notifikasi::all();
        // $ulasan = ulasan::where('barangpenjual_id', $penjual->id);
        $ulasan = ulasan::all();

        return view('DashboardUser.menu', compact('penjual', 'users', 'notifikasi', 'waktuKadaluwarsa', 'adminnotifikasi', 'ulasan', 'penjualId'));
    }

    public function beli(Request $request)
    {
        $penjual = barangpenjual::where('id', $request->id)->get();
        $userOrderData = [
            'namamenu_id' => $request->namamenu_id,
            'jumlah' => $request->jumlah,
            'adminstatus' => 'notactive',
            'pembelianstatus' => 'notactive',
        ];

        userOrder::create($userOrderData);
        dd($request->$penjual->id);
        return redirect()->route('pembelian', ['id' => $request->id]);
    }
    public function daftartoko(){
        $penjuallogin = penjuallogin::all();
        return view('DashboardUser.daftartoko',compact('penjuallogin'));
    }

    public function pembelian(Request $request)
    {
        $penjual = barangpenjual::with('userOrders')->has('userOrders')->where('id', $request->id)->get();
        $barang = barangpenjual::findOrFail($request->barangpenjual_id);
        $totalharga = ($barang->harga * $request->jumlah) + ($barang->harga * $request->jumlah * 0.05);

        $userOrderData = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'jumlah' => $request->jumlah,
            'adminstatus' => 'notactive',
            'pembelianstatus' => 'notactive',
            'toko_id' => $request->toko_id,
            'user_id' => $request->user_id,
            'totalharga' => $totalharga
        ];
        // dd($request->user_id);
        $userOrders =  userOrder::create($userOrderData);
        return redirect()->route('konfimasipembelian', ['id' => $userOrders->id]);

    }

    public function konfimasipembelian(Request $request)
    {


        $notifikasi = notifikasi::all();
        $penjualId = Auth::id();
        $userOrder = userOrder::findOrFail($request->id);
        $totalharga = userOrder::all();

        $penjual = barangpenjual::findOrFail($userOrder->barangpenjual_id);
        $notifikasi = notifikasi::all();
        $pembelian = adminmetodepembayaran::all();
        return view('DashboardUser.pembelian', compact('userOrder', 'penjual', 'notifikasi','pembelian'));
    }



    public function pesanan()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('adminstatus', 'approve')->get();
        $user = userOrder::where('user_id', $penjualId )->get();
        $penjual = barangpenjual::all();
        return view('DashboardUser.pesanan', compact('user', 'penjual', 'penjualId'));
    }

    public function riwayatuser()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('pembelianstatus', 'selesai')->orWhere('pembelianstatus', 'pesanan di tolak')->get();
        $user = userOrder::where('user_id', $penjualId);
        $penjual = barangpenjual::all();
        return view('DashboardUser.riwayat', compact('user', 'penjual'));
    }

    public function Userkeranjang()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('user_id', $penjualId);
        return view('DashboardUser.keranjang', compact('user'));
    }

    public function pengajuanuser()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('user_id', $penjualId);
        return view('DashboardUser.pengajuanuser', compact('user'));
    }

    public function profileuser()
    {
        $user = User::all();
        return view('DashboardUser.profileuser', compact('user'));
    }

    public function detailmenu()
    {
        $user = User::all();

        // $penjual =  barangpenjual::where('barangpenjual_id', $penjual->id)->get();
        $penjual = barangpenjual::all();
        return view('DashboardUser.detailmenu', compact('user', 'penjual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dashboardusercontrollers = userOrder::all();
        $penjual = barangpenjual::all();
        return view('DashboardUser.pembelian', compact('dashboardusercontrollers', 'penjual'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $dashboardusercontrollers = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'adminstatus' => 'notapprove',
            'pembelianstatus' => 'menunggu konfirmasi',
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'foto' => $request->foto,
            'toko_id' => $request->toko_id,
            'user_id' => $user_id,

        ];

        dd($request->all());
        if ($request->hasFile('foto')) {
            $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', request()->file('foto'));
            $validated['foto'] = $filePath;
        }
        $adminnotifikasi =  [
            'keterangan_admin' => 'ada pesanan  masuk',
            'isi_admin' => 'cek tabel pembelian untuk konfirmasi'
        ];
        $notifikasi = [
            'keterangan' => 'anda berhasil membuat pesanan',
            'isi' => 'lihat pesanan anda di menu pesanan',
            'user_id_notifikasi' => $request->user_id_notifikasi,
        ];

        // dd($request->user_id_notifikasi);
        adminnotifikasi::create($adminnotifikasi);
        notifikasi::create($notifikasi);
        userOrder::create($dashboardusercontrollers);
        return redirect()->route('menu.index')->with('success', 'berhasil membuat pesanan');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = userOrder::where('namamenu', 'like', '%' . $query . '%')->get();

        return response()->json($results);
    }


    public function ulasan(Request $request)
    {

        $ulasan = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar

        ];
        dd($request->all());
        ulasan::create($ulasan);
        return redirect()->route('riwayatuser');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user_id = Auth::id();
        // dd($user_id);
        // dd($request->all());
        $order = userOrder::findOrFail($id);

        $validatedData = $request->validate([
            'barangpenjual_id' => 'required',
            'jumlah' => 'required|integer',
            'catatan' => 'string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
            'toko_id' => 'required',
            'user_id' =>  'required'
        ]);


        if($order->user_id === $user_id )
        {
            $order->adminstatus = 'notapprove';
            $order->pembelianstatus = 'menunggu konfirmasi';


            // Simpan data yang diperbarui ke dalam pesanan
            $order->update($validatedData);
        } else {
            return redirect()->back()->with('error', 'id tidak valid');
        }

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', $request->file('foto'));
            $order->foto = $filePath;
            $order->save();
        }

        // Kirim notifikasi kepada admin
        $adminNotification = new adminnotifikasi();
        $adminNotification->keterangan_admin = 'Ada pesanan masuk!';
        $adminNotification->isi_admin = 'Cek halaman pembelian untuk konfirmasi';
        $adminNotification->save();

        // Kirim notifikasi kepada user
        $userNotification = new notifikasi();
        $userNotification->keterangan = 'Anda berhasil membuat pesanan!';
        $userNotification->isi = 'Lihat pesanan Anda di halaman pesanan';
        $userNotification->user_id_notifikasi = $request->user_id;
        $userNotification->save();

        // Redirect ke halaman yang sesuai setelah pengeditan
        session()->flash('notif.success', 'Anda berhasil membuat pesanan!');
        return redirect()->route('menu.index')->with('success', 'Anda berhasil membuat pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
