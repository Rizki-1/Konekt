<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ulasan;
use App\Models\keranjang;
use App\Models\Pembelian;
use App\Models\userOrder;
use App\Models\notifikasi;
use App\Models\penjuallogin;
use Illuminate\Http\Request;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\pengembaliandana;
use App\Models\notifikasipenjual;
use App\Models\pengemmbaliandana;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\adminmetodepembayaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException; // Import QueryException
use Exception; // Import Exception

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
        $userOrders =  userOrder::create($userOrderData);
        return redirect()->route('konfimasipembelian', ['ids' => $userOrders->id]);

    }

    public function order(Request $request)
    {
        $itemIds = $request->input('items');
        $user_id = Auth::id();

        if (!$itemIds || count($itemIds) === 0) {
            return response()->json(['message' => 'Pilih setidaknya satu item untuk dibeli.'], 400);
        }

        DB::beginTransaction();

        foreach ($itemIds as $itemId) {
            $keranjang = keranjang::findOrFail($itemId);

            $jumlah = ($keranjang->jumlah);

            $totalharga = ($keranjang->totalHarga);

            $userOrderData = [
                'id_keranjang' => $itemId,
                'jumlah' => $jumlah,
                'adminstatus' => 'notactive',
                'pembelianstatus' => 'notactive',
                'toko_id' => $keranjang->toko_id,
                'user_id' => $user_id,
                'totalharga' => $totalharga,
                'metodepembayaran' => 'waiting',
                'id' => uniqid(),
                'barangpenjual_id' => $keranjang->barangpenjual_id,

            ];

            $userOrder = userOrder::create($userOrderData);

            $keranjang->delete();

            $userOrdersIds[] = $userOrder->id;
        }

        $orderId = $userOrder->id;

        DB::commit();
        return response()->json(['message' => 'berhasil', 'id' => $userOrdersIds]);
    }

    public function updateKeranjang(Request $request)
    {

        $request->validate([
            'productId' => 'required|integer',
            'quantity' => 'required|integer|min:1|max:100',
        ]);


        $productId = $request->input('productId');
        $newQuantity = $request->input('quantity');
        $cartItem = Keranjang::find($productId);

        if (!$cartItem) {

            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan dalam keranjang.',
            ]);
        }
        $barangPenjual = barangpenjual::find($cartItem->barangpenjual_id);
        if (!$barangPenjual) {

            return response()->json([
                'success' => false,
                'message' => 'Data produk tidak ditemukan.',
            ]);
        }
        $cartItem->jumlah = $newQuantity;
        $hargaProduk = $barangPenjual->harga;
        $totalHarga = $newQuantity * $hargaProduk * 1.05;
        $cartItem->totalHarga = $totalHarga;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'totalHarga' => $totalHarga,
        ]);
    }

    public function konfimasipembelian($ids)
    {
        $orderIds = explode(',', $ids);
        $userOrder = userOrder::whereIn('id', $orderIds)->with('penjual')->get();

        if ($userOrder->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada pesanan yang ditemukan.');
        }


        $notifikasi = notifikasi::all();
        $user_id = Auth::id();
        $subtotalorder = $userOrder->sum('totalharga');

        $pembelian = adminmetodepembayaran::all();

        return view('DashboardUser.pembelian', compact('userOrder', 'user_id', 'notifikasi', 'subtotalorder', 'pembelian'));
    }



    public function pesanan()
    {
        $penjualId = Auth::id();
        $user = userOrder::where('user_id', $penjualId)
        ->whereNotNull('pembelianstatus')
        ->whereNotIn('pembelianstatus', ['statusselesai', 'pengembalian dana di terima', 'dibatalkan'])
        ->get();
        $pesanan = userOrder::where('pembelianstatus', 'selesai')->get();
        $penjual = barangpenjual::all();


        return view('DashboardUser.pesanan', compact('user', 'penjual', 'penjualId', 'pesanan'));
    }

    public function batalkanpesanan($id)
{

    $order = userOrder::find($id);
    $order->update([
        'pembelianstatus' => 'dibatalkan',
    ]);

    return redirect()->back()->with('success', 'pesanan berhasil di hapus');
}


public function riwayatuser()
{
    $user_id = Auth::id();
    $user = userOrder::where(function($query) use ($user_id) {
        $query->whereIn('pembelianstatus', ['statusselesai', 'dibatalkan', 'pesanan di tolak']);
    })
        ->where('user_id', $user_id)
        ->get();
    $penjual = barangpenjual::all();
    return view('DashboardUser.riwayat', compact('user', 'penjual'));
}

    public function Userkeranjang()
    {
        $user_id = Auth::id();


        $keranjangItems = Keranjang::with(['penjualLogin', 'barangPenjual'])
            ->where('user_id', $user_id)
            ->get();

        return view('DashboardUser.keranjang', compact('keranjangItems'));
    }

    public function tambahKeranjang(Request $request, $id)
    {
        try {

            $keranjang = new keranjang();
            $keranjang->user_id = $request->user_id;
            $keranjang->toko_id = $request->toko_id;
            $keranjang->barangpenjual_id = $request->barangpenjual_id;
            $keranjang->jumlah = $request->jumlah;
            $keranjang->totalHarga = $request->totalHarga;
            $keranjang->save();


            $response = [
                'success' => true,
                'message' => 'Item berhasil ditambahkan ke keranjang.'
            ];

            return response()->json($response);
        } catch (\Exception $e) {

            $response = [
                'success' => false,
                'message' => 'Terjadi kesalahan. Item tidak dapat ditambahkan ke keranjang.'
            ];

            return response()->json($response, 500);
        }
    }

    public function hapusKeranjang(Request $request)
    {
        $itemId = $request->input('item_id');


        $result = Keranjang::where('id', $itemId)->delete();

        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
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


    public function detailmenu(Request $request, $id)
    {
        $user = BarangPenjual::findOrFail($id);
        $penjual = BarangPenjual::where('id',$id)->get();
        $ulasan = ulasan::where('barangpenjual_id', $id)->get();
        // $penjual = BarangPenjual::all();

        return view('DashboardUser.detailmenu', compact('user', 'penjual', 'ulasan'));
    }


    public function daftartoko(){
        $penjuallogin = penjuallogin::all();
        return view ('DashboardUser.daftartoko', compact('penjuallogin'));
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




    public function ulasan(Request $request, $id)
{

    //dd($request->all());
    $username=Auth::user()->name;
    $penjual = BarangPenjual::findOrFail($id);
    $ulasan = ulasan::where('barangpenjual_id', $penjual->id)->get();

     $ulasan = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'username'=>$username,
            'rating' => $request->rating,
            'komentar' => $request->komentar

        ];

    ulasan::create($ulasan);
    return redirect()->route('riwayatuser');
}




    public function pengembaliandana(Request $request ,$id)
    {

        $userOrder = userOrder::findOrFail($id);
        // dd($userOrder);
        $userOrder->pembelianstatus = 'mengajukan pengembalian dana';
        $userOrder->metodepembayaran = $request->metodepembayaran;
        $userOrder->tujuanpembayaran = 'test dana';
        // dd($userOrder);
        $userOrder->save();
        // dd($userOrder);

        return redirect()->back()->with('success', 'pengembalian dana sedang di proses');
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

             return redirect()->route('konfimasipembelian');
         }else {
            return redirect()->route('konfimasipembelian');
         }
     }

    public function update(Request $request, $id)
    {

        $user_id = Auth::id();
        $order = userOrder::findOrFail($id);
        if($order->user_id != Auth::user()->id)
        {
            return back()->with('error', 'data user tidak valid');
        }
        $validatedData = $request->validate([
            'barangpenjual_id' => 'required',
            'jumlah' => 'required|integer',
            'catatan' => 'string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
            'toko_id' => 'required',
            'user_id' =>  'required'
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


        $userNotification = new notifikasi();
        $userNotification->keterangan = 'Anda berhasil membuat pesanan!';
        $userNotification->isi = 'Lihat pesanan Anda di halaman pesanan';
        $userNotification->user_id_notifikasi = $request->user_id;
        $userNotification->save();

        return redirect()->route('menu.index')->with('success', 'Anda berhasil membuat pesanan');
    }


    public function massUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $itemIds = $request->input('ids');

            foreach ($itemIds as $orderId) {
                $order = userOrder::find($orderId);
                if ($order) {

                    $order->barangpenjual_id = $request->input("barangpenjual_id_$orderId");
                    $order->adminstatus = 'notapprove';
                    $order->pembelianstatus = 'menunggu konfirmasi';
                    $order->jumlah = $request->input("jumlah_$orderId");
                    $order->catatan = $request->input("catatan_$orderId");
                    $order->foto = $request->foto;
                    $order->toko_id = $request->input("toko_id_$orderId");
                    $order->user_id = $request->input("user_id_$orderId");
                    $order->metodepembayaran = $request->metodepembayaran;

                    $order->save();

                    if ($request->hasFile('foto')) {
                        $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', $request->file('foto'));
                        $order->foto = $filePath;
                        $order->save();
                    }

                }
            }

            $adminNotification = new adminnotifikasi();
            $adminNotification->keterangan_admin = 'Ada pesanan masuk!';
            $adminNotification->isi_admin = 'Cek halaman pembelian untuk konfirmasi';
            $adminNotification->save();

            // Kirim notifikasi kepada user
            $userNotification = new notifikasi();
            $userNotification->keterangan = 'Anda berhasil membuat pesanan!';
            $userNotification->isi = 'Lihat pesanan Anda di halaman pesanan';
            $userNotification->user_id_notifikasi = $request->input("user_id_$orderId");
            $userNotification->save();

            // Tambahkan respons yang sesuai
            return response()->json(['message' => 'Pembaruan massal berhasil.']);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Terjadi kesalahan database: ' . $e->getMessage()], 500);
        } catch (Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
