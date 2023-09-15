<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ulasan;
use App\Models\Pembelian;
use App\Models\userOrder;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\notifikasipenjual;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Storage;

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


    public function pembelian(Request $request)
    {
        $penjual = barangpenjual::with('userOrders')->has('userOrders')->where('id', $request->id)->get();
        $userOrderData = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'jumlah' => $request->jumlah,
            'adminstatus' => 'notactive',
            'pembelianstatus' => 'notactive',
            'toko_id' => $request->toko_id,
            'user_id' => $request->user_id,
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
        // $userOrder = userOrder::all
        $penjual = barangpenjual::findOrFail($userOrder->barangpenjual_id);
        $notifikasi = notifikasi::all();

        return view('DashboardUser.pembelian', compact('userOrder', 'penjual', 'penjualId', 'notifikasi'));
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

    public function profileuser()
    {
        $user = User::all();
        return view('DashboardUser.profileuser', compact('user'));
    }

    public function detailmenu()
    {
        $user = User::all();
        $penjual =  barangpenjual::all();
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

        $dashboardusercontrollers = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'adminstatus' => 'notapprove',
            'pembelianstatus' => 'menunggu konfirmasi',
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'foto' => $request->foto,
            'toko_id' => $request->toko_id,
            'user_id' => $request->user_id,

        ];

        // dd($request->all());
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
        // dd($request->all());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil data userOrder yang akan diupdate
        $userOrder = userOrder::findOrFail($id);

        // Update nilai-nilai yang sesuai
        $userOrder->barangpenjual_id = $request->barangpenjual_id;
        $userOrder->jumlah = $request->jumlah;
        $userOrder->catatan = $request->catatan;

        // Cek apakah foto saat ini adalah null
        if (is_null($userOrder->foto)) {
            // Jika foto saat ini adalah null, unggah foto baru
            if ($request->hasFile('foto')) {
                $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', request()->file('foto'));
                $userOrder->foto = $filePath;
            }
        } else {
            // Jika foto saat ini tidak null, hapus foto lama jika ada foto baru yang diunggah
            if ($request->hasFile('foto')) {
                Storage::disk('public')->delete($userOrder->foto);
                $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', request()->file('foto'));
                $userOrder->foto = $filePath;
            }
        }

        // Update adminstatus dan pembelianstatus menjadi 'notapprove'
        $userOrder->adminstatus = 'notapprove';
        $userOrder->pembelianstatus = 'notapprove';

        // Simpan perubahan ke database
        $userOrder->save();

        // Redirect ke halaman yang sesuai setelah update
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
