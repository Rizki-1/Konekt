<?php

namespace App\Http\Controllers;

use App\Models\userOrder;
use App\Models\notifikasi;
use App\Models\adminnotifikasi;
use App\Models\notifikasipenjual;
use illuminate\Support\Facades\Storage;
use App\Models\barangpenjual;
use Illuminate\Http\Request;
use App\Models\Pembelian;

class dashboardusercontroller extends Controller
{
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

        return view('DashboardUser.menu', compact('penjual', 'users', 'notifikasi', 'waktuKadaluwarsa', 'adminnotifikasi'));
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


    public function pembelian(Request $request)
    {
        $penjual = barangpenjual::with('userOrders')->has('userOrders')->where('id', $request->id)->get();
        $userOrderData = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'jumlah' => $request->jumlah,
            'adminstatus' => 'notactive',
            'pembelianstatus' => 'notactive',
        ];
        $userOrders =  userOrder::create($userOrderData);

        return redirect()->route('konfimasipembelian', ['id' => $userOrders->barangpenjual_id]);

    }

    public function konfimasipembelian(Request $request)
    {
        $penjual = barangpenjual::with('userOrders')->has('userOrders')->where('id', $request->id)->get();
        $userOrders = userOrder::where('barangpenjual_id', $request->input('barangpenjual_id'))->get();
        return view('DashboardUser.pembelian', compact('userOrders', 'penjual'));
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
        $user = userOrder::all();
        return view('DashboardUser.pengajuanuser', compact('user'));
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

        // Validasi data yang masuk
        // $request->validate([
        //     'jumlah' => 'required|integer|min:1',
        //     'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);


        $dashboardusercontrollers = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'adminstatus' => 'notapprove',
            'pembelianstatus' => 'menunggu konfirmasi',
            'jumlah' => $request->jumlah, // Ambil nilai dari input 'jumlah'
            'catatan' => $request->catatan, // Ambil nilai dari input 'catatan'
        ];
     
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
        ];
        adminnotifikasi::create($adminnotifikasi);
        notifikasi::create($notifikasi);
        userOrder::create($dashboardusercontrollers);


        return redirect()->route('menu.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = userOrder::where('namamenu', 'like', '%' . $query . '%')->get();

        return response()->json($results);
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
