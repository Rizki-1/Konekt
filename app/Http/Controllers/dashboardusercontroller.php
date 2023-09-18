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
use Illuminate\Support\Facades\Storage;

class dashboardusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $users = userOrder::all();
        $notifikasi = notifikasi::where('user_id_notifikasi', $user_id);
        $penjual =  barangpenjual::all();
        $adminnotifikasi = adminnotifikasi::all();
        $waktuKadaluwarsa = notifikasi::all();
        // $ulasan = ulasan::where('barangpenjual_id', $penjual->id);
        $ulasan = ulasan::all();

        return view('DashboardUser.menu', compact('penjual', 'users', 'notifikasi', 'waktuKadaluwarsa', 'adminnotifikasi', 'ulasan', 'user_id'));
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
        $barang = barangpenjual::findOrFail($request->barangpenjual_id);
        $totalharga = ($barang->harga * $request->jumlah) + ($barang->harga * $request->jumlah * 0.05);

        $userOrderData = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'jumlah' => $request->jumlah,
            'adminstatus' => 'notactive',
            'pembelianstatus' => 'notactive',
            'toko_id' => $request->toko_id,
            'user_id' => $request->user_id,
            'totalharga' => $totalharga,
            'metodepembayaran' => 'waiting'
        ];
        // dd($request->user_id);
        $userOrders =  userOrder::create($userOrderData);
        return redirect()->route('konfimasipembelian', ['id' => $userOrders->id]);

    }



    public function konfimasipembelian(Request $request)
    {


        $notifikasi = notifikasi::all();
        $user_id = Auth::id();
        $userOrder = userOrder::findOrFail($request->id);

        $totalharga = userOrder::all();

        $penjual = barangpenjual::findOrFail($userOrder->barangpenjual_id);
        $notifikasi = notifikasi::all();

        return view('DashboardUser.pembelian', compact('userOrder', 'penjual', 'user_id', 'notifikasi'));
    }



    public function pesanan()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('user_id', $penjualId )->get();
        $pesanan = userOrder::where('pembelianstatus', 'selesai')->get();
        $penjual = barangpenjual::all();
        return view('DashboardUser.pesanan', compact('user', 'penjual', 'penjualId', 'pesanan'));
    }

    public function riwayatuser()
    {
        $user_id = Auth::id();
        $user = userOrder::where(function($query) use ($user_id) {
            $query->where('pembelianstatus', 'statusselesai')
                  ->orWhere('pembelianstatus', 'pesanan di tolak');
        })
        ->where('user_id', $user_id)
        ->get();

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


    public function tandakanselesai($id)
    {
        $user = userOrder::findOrFail($id);
        $user->pembelianstatus = 'statusselesai';
        $user->save();

        return redirect()->back()->with('success', 'pesanan telah selesai cek riwayat anda');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user_id = Auth::id();
        // $datapenjual = barangpenjual::findOrFail($id);

        $dashboardusercontrollers = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'adminstatus' => 'notapprove',
            'pembelianstatus' => 'menunggu konfirmasi',
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'foto' => $request->foto,
            'toko_id' => $request->toko_id,
            'user_id' => $user_id,
            'metodepembayaran' => $request->metodepembayaran

        ];
        // $newTotalharga = ($dashboardusercontrollers['jumlah'] * $datapenjual->harga) + ($dashboardusercontrollers['jumlah'] * $datapenjual->harga* 0.05);

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

     public function CheckKeranjang($id)
     {

          $user = userOrder::where('user_id', $id)->get();
          $totalHargaKeseluruhan = 0;
          foreach ($user as $item) {
          $totalHargaKeseluruhan += $item->totalharga;
         }

         if($totalHargaKeseluruhan > 1)
         {
             $subtotalorder = userOrder::findOrFail($id);
             $subtotalorder->subtotalorder = $totalHargaKeseluruhan;
             $subtotalorder->save();

             return redirect()->route('menu.update');
         }else {
            return redirect()->route('menu.update');
         }
     }



    public function update(Request $request, $id)
    {

        // dd($user_id);
        // dd($request->all());
        $user_id = Auth::id();
        $order = userOrder::findOrFail($id);
        // $datapenjual = barangpenjual::findOrFail($id);
        $validatedData = $request->validate([
            'barangpenjual_id' => 'required',
            'jumlah' => 'required|integer',
            'catatan' => 'string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
            'toko_id' => 'required',
            'user_id' =>  'required',
            'totalharga' => 'required',
            'metodepembayaran' => 'required'
        ]);
        $dashboardusercontrollers = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'adminstatus' => 'notapprove',
            'pembelianstatus' => 'menunggu konfirmasi',
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'foto' => $request->foto,
            'toko_id' => $request->toko_id,
            'user_id' => $user_id,
            'metodepembayaran' => $request->metodepembayaran

        ];
            $order->adminstatus = 'notapprove';
            $order->pembelianstatus = 'menunggu konfirmasi';



            $order->update($dashboardusercontrollers);


        if ($request->hasFile('foto')) {
            $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', $request->file('foto'));
            $order->foto = $filePath;
            $order->save();
        }


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

        return redirect()->route('menu.index')->with('success', 'Anda berhasil membuat pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
