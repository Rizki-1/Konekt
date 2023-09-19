<?php

namespace App\Http\Controllers;

use App\Models\adminmetodepembayaran;
use App\Models\User;
use App\Models\ulasan;
use App\Models\Pembelian;
use App\Models\userOrder;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\keranjang;
use App\Models\notifikasipenjual;
use App\Models\penjuallogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        return redirect()->route('konfimasipembelian', ['id' => $userOrders->id]);

    }

    public function order(Request $request)
    {
        $itemIds = $request->input('items');

        if (!$itemIds || count($itemIds) === 0) {
            return response()->json(['message' => 'Pilih setidaknya satu item untuk dibeli.'], 400);
        }

        // Proses pembelian untuk setiap item yang dicentang
        $userOrdersIds = [];

        DB::beginTransaction();

        try {
            foreach ($itemIds as $itemId) {
                // Ambil item dari database berdasarkan ID
                $barang = barangpenjual::findOrFail($itemId);

                // Hitung total harga dengan pajak
                $totalharga = ($barang->harga * $request->jumlah) + ($barang->harga * $request->jumlah * 0.05);

                // Buat data pembelian untuk item ini
                $userOrderData = [
                    'barangpenjual_id' => $itemId,
                    'jumlah' => $request->jumlah, // Pastikan Anda memiliki jumlah yang sesuai di sini
                    'adminstatus' => 'notactive',
                    'pembelianstatus' => 'notactive',
                    'toko_id' => $barang->toko_id,
                    'user_id' => $request->user_id,
                    'totalharga' => $totalharga
                ];

                // Buat pembelian untuk item ini
                $userOrders = userOrder::create($userOrderData);

                // Simpan ID pembelian ke dalam array
                $userOrdersIds[] = $userOrders->id;
            }

            // Commit transaksi ke database
            DB::commit();

            dd($userOrdersIds);

            return response()->json(['success' => true, 'message' => 'Pembelian berhasil.', 'orderIds' => $userOrdersIds]);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return response()->json(['message' => 'Terjadi kesalahan dalam melakukan pembelian.'], 500);
            dd($e->getMessage());
        }
    }

    public function konfimasipembelian(Request $request)
    {
        $notifikasi = notifikasi::all();
        $user_id = Auth::id();
        $userOrder = userOrder::findOrFail($request->id);
        $subtotalorder = $userOrder->subtotalorder;

        $totalharga = userOrder::all();

        $penjual = barangpenjual::findOrFail($userOrder->barangpenjual_id);
        $notifikasi = notifikasi::all();
        $pembelian = adminmetodepembayaran::all();

        return view('DashboardUser.pembelian', compact('userOrder', 'penjual', 'user_id', 'notifikasi', 'subtotalorder','pembelian'));
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
        $user_id = Auth::id();

        // Mengambil data keranjang beserta relasinya
        $keranjangItems = Keranjang::with(['penjualLogin', 'barangPenjual'])
            ->where('user_id', $user_id)
            ->get();

        return view('DashboardUser.keranjang', compact('keranjangItems'));
    }

    public function tambahKeranjang(Request $request, $id)
    {
        try {
            // Validasi permintaan
            // $request->validate([
            //     'user_id' => 'required|integer', // Pastikan user_id adalah integer
            //     'toko_id' => 'required|integer', // Pastikan toko_id adalah integer
            //     'barangpenjual_id' => 'required|integer', // Pastikan barangpenjual_id adalah integer
            //     'jumlah' => 'required|integer|min:1', // Pastikan jumlah adalah integer positif
            // ]);

            // Anda dapat menambahkan logika tambahan di sini, misalnya,
            // membuat entri baru di tabel keranjang dengan data yang diterima dari permintaan

            // Contoh:
            $keranjang = new keranjang();
            $keranjang->user_id = $request->user_id;
            $keranjang->toko_id = $request->toko_id;
            $keranjang->barangpenjual_id = $request->barangpenjual_id;
            $keranjang->jumlah = $request->jumlah;
            $keranjang->totalHarga = $request->totalHarga;
            $keranjang->save();

            // Mengatur respons JSON sukses
            $response = [
                'success' => true,
                'message' => 'Item berhasil ditambahkan ke keranjang.'
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            // Mengatur respons JSON error
            $response = [
                'success' => false,
                'message' => 'Terjadi kesalahan. Item tidak dapat ditambahkan ke keranjang.'
            ];

            return response()->json($response, 500); // Menggunakan status code 500 untuk error server
        }
    }

    public function hapusKeranjang(Request $request)
    {
        $itemId = $request->input('item_id');

        // Hapus item keranjang berdasarkan ID
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

    public function detailmenu()
    {
        $user = User::all();

        // $penjual =  barangpenjual::where('barangpenjual_id', $penjual->id)->get();
        $penjual = barangpenjual::all();
        return view('DashboardUser.detailmenu', compact('user', 'penjual'));
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
