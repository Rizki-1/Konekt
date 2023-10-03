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
use App\Models\adminkategori;
use App\Models\barangpenjual;
use App\Models\adminnotifikasi;
use App\Models\pengembaliandana;
use App\Models\notifikasipenjual;
use App\Models\pengemmbaliandana;
use Exception; // Import Exception
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\adminmetodepembayaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException; // Import QueryException

class dashboardusercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $users = userOrder::all();
        $notifikasi = notifikasi::where('user_id_notifikasi', $user_id)
            ->where('is_read', false)
            ->get();
        $penjualpagination =  barangpenjual::paginate(8);
        $penjual = barangpenjual::all();
        $adminnotifikasi = adminnotifikasi::all();
        $kategori = adminkategori::all();
        $ulasan = ulasan::avg('rating');
        $totalUlasan = ulasan::all()->count();

        return view('DashboardUser.menu', compact('penjual', 'users', 'notifikasi', 'adminnotifikasi', 'ulasan', 'user_id', 'kategori', 'penjualpagination', 'totalUlasan'));
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
        try {

            $pembelian = new userOrder();
            $pembelian->user_id = $request->user_id;
            $pembelian->toko_id = $request->toko_id;
            $pembelian->barangpenjual_id = $request->barangpenjual_id;
            $pembelian->jumlah = $request->jumlah;
            $pembelian->totalHarga = $request->totalHarga;
            $pembelian->adminstatus = 'notactive';
            $pembelian->pembelianstatus = 'notactive';
            $pembelian->metodepembayaran = 'waiting';
            $pembelian->save();

            $response = [
                'success' => true,
                'message' => 'Anda berhasil memesan!',
                'id' => $pembelian->id
            ];

            return response()->json($response);
        } catch (\Exception $e) {

            $response = [
                'success' => false,
                'message' => 'Terjadi kesalahan. Item tidak dapat ditambahkan ke pesanan.'
            ];

            return response()->json($response, 500);
        }
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

            // dd($userOrdersIds);

            //     return response()->json(['success' => true, 'message' => 'Pembelian berhasil.', 'orderIds' => $userOrdersIds]);
            // } catch (\Exception $e) {
            //     // Rollback transaksi jika terjadi kesalahan
            //     DB::rollback();

            //     return response()->json(['message' => 'Terjadi kesalahan dalam melakukan pembelian.'], 500);
            //     // dd($e->getMessage());
            // }
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

    public function konfimasipembelian(Request $request, $ids)
    {
        $orderIds = explode(',', $ids);
        $userOrder = userOrder::whereIn('id', $orderIds)->with('penjual')->get();

        if ($userOrder->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada pesanan yang ditemukan.');
        }

        $notifikasi = notifikasi::all();
        $user_id = Auth::id();
        $subtotalorder = $userOrder->sum('totalharga');

        $bank = adminmetodepembayaran::where('metodepembayaran', 'bank')->get();
        $wallet = adminmetodepembayaran::where('metodepembayaran', 'e-wallet')->get();
        return view('DashboardUser.pembelian', compact('userOrder', 'user_id', 'wallet', 'notifikasi', 'subtotalorder', 'bank'));
    }



    public function pesanan()
    {
        $userId = Auth::id();
        $user = userOrder::where('user_id', $userId)
            ->whereNotNull('pembelianstatus')
            ->whereNotIn('pembelianstatus', ['statusselesai', 'pengembalian dana di terima', 'dibatalkan'])
            ->paginate(4);

        return view('DashboardUser.pesanan', compact('user', 'userId'));
    }

    public function batalkanpesanan($id)
    {
        $order = userOrder::find($id);
        $order->update([
            'pembelianstatus' => 'dibatalkan',
            'adminstatus' => 'pesanan di batalkan',
        ]);

        return redirect()->back()->with('success', 'pesanan berhasil di batalkan');
    }


    public function riwayatuser()
    {

        $user_id = Auth::id();
        $user = userOrder::where('user_orders.user_id', $user_id)
            ->whereNotNull('pembelianstatus')
            ->whereIn('pembelianstatus', ['statusselesai', 'pesanan di tolak', 'dibatalkan'])
            ->join('penjuallogins', 'penjuallogins.user_id', '=', 'user_orders.toko_id')
            ->select('user_orders.*', 'penjuallogins.nama_toko')
            ->paginate(4);

        return view('DashboardUser.riwayat', compact('user', 'user_id'));
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
            $user_id = $request->user_id;
            $toko_id = $request->toko_id;
            $barangpenjual_id = $request->barangpenjual_id;
            $jumlah = $request->jumlah;
            $totalHarga = $request->totalHarga;

            // Cek apakah sudah ada entri dengan user_id, toko_id, dan barangpenjual_id yang sama
            $existingItem = keranjang::where('user_id', $user_id)
                ->where('toko_id', $toko_id)
                ->where('barangpenjual_id', $barangpenjual_id)
                ->first();

            if ($existingItem) {
                // Jika sudah ada, update jumlah dan total harga dengan menambahkannya
                $existingItem->jumlah += $jumlah;
                $existingItem->totalHarga += $totalHarga;
                $existingItem->save();
            } else {
                // Jika belum ada, buat entri baru
                $keranjang = new keranjang();
                $keranjang->user_id = $user_id;
                $keranjang->toko_id = $toko_id;
                $keranjang->barangpenjual_id = $barangpenjual_id;
                $keranjang->jumlah = $jumlah;
                $keranjang->totalHarga = $totalHarga;
                $keranjang->save();
            }

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

    public function pengajuanuser(Request $request)
    {
        // dd($request->all());
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
        $penjual = BarangPenjual::where('id', $id)->get();
        $ulasan = ulasan::where('barangpenjual_id', $id)->get();
        // $penjual = BarangPenjual::all();

        return view('DashboardUser.detailmenu', compact('user', 'penjual', 'ulasan'));
    }


    public function daftartoko()
    {
        $penjuallogin = penjuallogin::paginate(4);
        foreach ($penjuallogin as $p) {
            $url = url('/chatify/' . $p->user->id);
        }
        return view('DashboardUser.daftartoko', compact('penjuallogin', 'url'));
    }

    public function detailtoko(Request $request, $id)
    {
        $penjualId = Auth::id();
        $penjual = barangpenjual::where('toko_id', $penjualId)->get();
        $user = penjuallogin::where('id', $id)->get();

        return view('DashboardUser.detailtoko', compact('penjual', 'user'));
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
        $username = Auth::user()->name;
        $penjual = BarangPenjual::findOrFail($id);
        $ulasan = ulasan::where('barangpenjual_id', $penjual->id)->get();

        $request->validate([
            'barangpenjual_id' => 'required',
            'rating' => 'required|min:1',
            'komentar' => 'required|max:255',
        ], [
            'barangpenjual_id.required' => 'ada kesalahan',
            'rating.required' => 'rating tidak boleh kosong ',
            'rating.min' => 'rating minimal 1',
            'komentar.required' => 'komentar tidak boleh kosong',
            'komentar.max' => 'komentar maximal hanya 255 karakter'
        ]);

        $ulasan = [
            'barangpenjual_id' => $request->barangpenjual_id,
            'username' => $username,
            'rating' => $request->rating,
            'komentar' => $request->komentar

        ];

        // Validasi dilakukan sebelum halaman di-refresh
        // if ($request->hasErrors()) {
        //     return redirect()->back()->withErrors($request->errors());
        // }

        ulasan::create($ulasan);
        return redirect()->route('riwayatuser');
    }

    public function pengembaliandana(Request $request, $id)
    {

        // dd($request->all());
        // Validasi input umum
        $request->validate([
            'tujuanpembayaran' => 'required',
            'totalharga' => 'required', // Atur validasi sesuai dengan kebutuhan Anda
            'keterangan_metode_pengembalian' => 'nullable|file', // Validasi file jika ada, boleh kosong jika teks
        ]);

        $userOrder = UserOrder::findOrFail($id);


        $userOrder->pembelianstatus = 'mengajukan pengembalian dana';
        $userOrder->tujuanpembayaran = $request->input('tujuanpembayaran');

        // Menentukan metode pengembalian berdasarkan metode pembayaran yang dipilih
        $selectedPaymentMethod = $request->input('tujuanpembayaran');

        if ($selectedPaymentMethod === 'bank') {
            $request->validate([
                'metode_pengembalian_bank' => 'required_if:tujuanpembayaran,bank',
            ]);

            $userOrder->metode_pengembalian = $request->input('metode_pengembalian_bank');
        } elseif ($selectedPaymentMethod === 'e-wallet') {
            // Hanya validasi metode pengembalian jika metode pembayaran adalah "e-wallet"
            $request->validate([
                'metode_pengembalian_ewallet' => 'required_if:tujuanpembayaran,ewallet',
            ]);

            $userOrder->metode_pengembalian = $request->input('metode_pengembalian_ewallet');
        }

        // Penanganan file yang diunggah jika ada
        if ($request->hasFile('keterangan_metode_pengembalian')) {
            $file = $request->file('keterangan_metode_pengembalian');
            $fileName = $file->hashName(); // Mendapatkan nama file asli
            $file->storeAs('public/pengajuanUser', $fileName); // Menyimpan file ke folder tujuan yang sesuai
            $userOrder->keterangan_metode_pengembalian = $fileName; // Menyimpan nama file ke database
        } else {
            // Jika tidak ada file diunggah, ambil teks dari input
            $userOrder->keterangan_metode_pengembalian = $request->input('keterangan_metode_pengembalian');
        }

        $userOrder->save();
        return redirect()->back()->with('success', 'Pengajuan pengembalian dana berhasil');
    }


    public function CheckKeranjang($id)
    {

        $user = userOrder::where('user_id', $id)->get();
        $totalHargaKeseluruhan = 0;
        foreach ($user as $item) {
            $totalHargaKeseluruhan += $item->totalharga;
        }

        if ($totalHargaKeseluruhan > 1) {
            $subtotalorder = userOrder::findOrFail($id);
            $subtotalorder->subtotalorder = $totalHargaKeseluruhan;
            $subtotalorder->save();

            return redirect()->route('konfimasipembelian');
        } else {
            return redirect()->route('konfimasipembelian');
        }
    }

    public function update(Request $request, $id)
    {

        $user_id = Auth::id();
        $order = userOrder::findOrFail($id);
        if ($order->user_id != Auth::user()->id) {
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
                // Validasi input untuk setiap pesanan
                $validatedData = $request->validate([
                    "jumlah_$orderId" => 'required|integer|min:1',
                    "catatan" => 'nullable|string|max:255',
                    "foto" => 'required|image|max:2048', // Ubah sesuai dengan aturan validasi foto
                    "barangpenjual_id_$orderId" => 'required|exists:barangpenjuals,id',
                    "toko_id_$orderId" => 'required|exists:users,id',
                    "user_id_$orderId" => 'required|exists:users,id',
                    "metodepembayaran" => 'required|in:e-wallet,bank', // Sesuaikan dengan metode pembayaran yang valid
                ], [
                    "jumlah_$orderId.required" => 'Jumlah harus diisi untuk pesanan ini.',
                    "jumlah_$orderId.integer" => 'Jumlah harus berupa angka.',
                    "jumlah_$orderId.min" => 'Jumlah minimal 1.',
                    "catatan.max" => 'Catatan maksimal 255 karakter.',
                    "foto.required" => 'Ukuran foto terlalu besar, maksimal 2MB.',
                    "foto.max" => 'Ukuran foto terlalu besar, maksimal 2MB.',
                    "foto.image" => 'File harus berupa gambar.',
                    "barangpenjual_id_$orderId.required" => 'Barang penjual tidak valid.',
                    "toko_id_$orderId.required" => 'Toko tidak valid.',
                    "user_id_$orderId.required" => 'User tidak valid.',
                    "metodepembayaran.required" => 'Metode pembayaran harus dipilih.',
                    "metodepembayaran.in" => 'Metode pembayaran tidak valid.',
                ]);

                $order = userOrder::find($orderId);

                if ($order) {
                    $order->barangpenjual_id = $validatedData["barangpenjual_id_$orderId"];
                    $order->adminstatus = 'notapprove';
                    $order->pembelianstatus = 'menunggu konfirmasi';
                    $order->jumlah = $validatedData["jumlah_$orderId"];
                    $order->catatan = $validatedData["catatan"];
                    $order->toko_id = $validatedData["toko_id_$orderId"];
                    $order->user_id = $validatedData["user_id_$orderId"];
                    $order->metodepembayaran = $validatedData["metodepembayaran"];

                    if ($request->hasFile('foto')) {
                        $filePath = Storage::disk('public')->put('pembeli/bukti_pembayaran', $request->file('foto'));
                        $order->foto = $filePath;
                    }

                    $order->save();
                }
            }

            // Iterasi melalui item pembelian
            foreach ($itemIds as $orderId) {
                $jumlah = $request->input('jumlah_' . $orderId);

                // Mengurangkan stok di barangpenjual
                $barangPenjual = BarangPenjual::find($request->input('barangpenjual_id_' . $orderId));
                $barangPenjual->stok -= $jumlah;
                $barangPenjual->save();
            }

            $adminNotification = new adminnotifikasi();
            $adminNotification->keterangan_admin = 'Ada pesanan masuk!';
            $adminNotification->isi_admin = 'Cek halaman pembelian untuk konfirmasi';
            $adminNotification->save();

            // Kirim notifikasi kepada user
            $userNotification = new notifikasi();
            $userNotification->keterangan = 'Anda berhasil membuat pesanan!';
            $userNotification->isi = 'Lihat pesanan Anda di halaman pesanan';
            $userNotification->user_id_notifikasi = $validatedData["user_id_$orderId"];
            $userNotification->save();

            // Tambahkan respons yang sesuai
            return response()->json(['message' => 'Pembaruan massal berhasil.']);
        } catch (ValidationException $e) {
            // Tangkap kesalahan validasi dan kirim respon JSON dengan pesan kesalahan
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Tangkap kesalahan lainnya dan kirim respon JSON dengan pesan kesalahan
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        // Ambil kata kunci pencarian dari input form
        $searchTerm = $request->input('query');

        // Lakukan pencarian pada model BarangPenjual (sesuaikan dengan model Anda)
        $results = barangpenjual::where('namamenu', 'like', '%' . $searchTerm . '%')->get();

        // Kembalikan hasil pencarian dalam format JSON
        return response()->json($results);
    }

    public function caritoko(Request $request)
    {
        // Ambil kata kunci pencarian dari input form
        $searchTerm = $request->input('query');

        // Lakukan pencarian pada model BarangPenjual (sesuaikan dengan model Anda)
        $results = penjuallogin::where('nama_toko', 'like', '%' . $searchTerm . '%')->get();

        // Kembalikan hasil pencarian dalam format JSON

        return response()->json($results);
    }

    public function caripesanan(Request $request)
    {
        // Ambil kata kunci pencarian dari input form
        $searchTerm = $request->input('query');

        $userId = Auth::id();

        // Lakukan pencarian pada model userOrder dengan relasi ke penjual
        $results = userOrder::whereHas('penjual', function ($query) use ($searchTerm) {
            $query->where('namamenu', 'like', '%' . $searchTerm . '%');
        })
            ->whereNotIn('pembelianstatus', ['statusselesai', 'pengembalian dana di terima', 'dibatalkan'])
            ->where('user_id', $userId)
            ->with('penjual')
            ->get();

        // Kembalikan hasil pencarian dalam format JSON
        return response()->json($results);
    }


    public function kategorifilter($Kategori)
    {
        $user_id = Auth::id();
        $notifikasi = notifikasi::where('user_id_notifikasi', $user_id)
            ->where('is_read', false)
            ->get();
        $kategori = adminkategori::all();
        $penjualpagination =  barangpenjual::paginate(8);
        $penjual = Barangpenjual::where('kategori_id', $Kategori)->get();
        $ulasan = ulasan::avg('rating');

        return view('DashboardUser.menu', compact('penjual', 'user_id', 'notifikasi', 'kategori', 'penjualpagination', 'ulasan'));
    }

    public function notifikasiuser()
    {
        $user = Auth::id();
        // Hitung jumlah notifikasi dari sumber data Anda, misalnya basis data
        $notificationCount = notifikasi::where('user_id_notifikasi', $user)
            ->where('is_read', false)
            ->count(); // Contoh: Menghitung notifikasi yang belum dibaca
        return response()->json(['count' => $notificationCount]);
    }

    public function readnotifikasiuser($id)
    {
        $notification = notifikasi::find($id);

        if ($notification) {
            $notification->update(['is_read' => true]);
            return response()->json(['message' => 'Notifikasi telah dibaca']);
        }

        return response()->json(['message' => 'Notifikasi tidak ditemukan'], 404);
    }
}
