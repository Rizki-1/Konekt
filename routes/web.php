<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\logincontroller;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\penjualcontroller;
use App\Http\Controllers\rolepenjualcontroller;
use App\Http\Controllers\dashboardusercontroller;
use App\Http\Controllers\adminpembeliancontroller;
use App\Http\Controllers\mailcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['ceklogin'])->group(function () {

Route::middleware(['AdminMiddleware'])->group(function () {
    Route::patch('terima/{id}', [adminpembeliancontroller::class, 'terima'])->name('admin.terima');
    Route::patch('tolak/{id}', [adminpembeliancontroller::class, 'tolak'])->name('admin.tolak');
    Route::patch('terimapenjual/{id}', [adminpembeliancontroller::class, 'terimapenjual'])->name('terimapenjual');
    Route::delete('tolakpenjual/{id}', [adminpembeliancontroller::class, 'tolakpenjual'])->name('tolakpenjual');
    Route::resource('pembelianadmin', App\Http\Controllers\adminpembeliancontroller::class);
    Route::get('metodpembayaran', [adminpembeliancontroller::class, 'metodpembayaran'])->name('metodpembayaran');
    Route::get('kategori', [adminpembeliancontroller::class, 'kategori'])->name('kategori');
    Route::post('kstore', [adminpembeliancontroller::class, 'kstore'])->name('kstore');
    Route::get('kedit/{id}/edit', [adminpembeliancontroller::class, 'kedit'])->name('kedit');
    Route::get('aedit/{id}/edit', [adminpembeliancontroller::class, 'aedit'])->name('aedit');
    Route::put('kupdate/{id}', [adminpembeliancontroller::class, 'kupdate'])->name('kupdate');
    Route::put('aupdate/{id}', [adminpembeliancontroller::class, 'aupdate'])->name('aupdate');
    Route::delete('kdestroy/{admink}', [adminpembeliancontroller::class, 'kdestroy'])->name('kdestroy');
    Route::delete('adestroy/{adminmp}', [adminpembeliancontroller::class, 'adestroy'])->name('adestroy');
    Route::get('DashboardAdmin',[adminpembeliancontroller::class, 'DashboardAdmin'])->name('DashboardAdmin');
    Route::get('calonpenjual', [adminpembeliancontroller::class, 'calonpenjual'])->name('calonpenjual');
    Route::get('pengajuanpembeliad', [adminpembeliancontroller::class, 'pengajuanpembeliad'])->name('pengajuanpembeliad');
    Route::get('pengajuanpenjualad', [adminpembeliancontroller::class, 'pengajuanpenjualad'])->name('pengajuanpenjualad');
    Route::post('terimapengajuan/{id}', [adminpembeliancontroller::class, 'terimapengajuan'])->name('terimapengajuan');
    Route::get('notifikasiadmin', [adminpembeliancontroller::class, 'notifikasiadmin'])->name('notifikasiadmin');
    Route::post('readnotifikasiadmin/{id}', [adminpembeliancontroller::class, 'readnotifikasiadmin'])->name('readnotifikasiadmin');
    Route::patch('terimapengajuanuser/{id}', [adminpembeliancontroller::class, 'terimapengajuanuser'])->name('terimapengajuanuser');
});

Route::middleware(['userMiddleware'])->group(function ()
    {
    Route::get('daftartoko', [dashboardusercontroller::class,'daftartoko'])->name('daftartoko');
    Route::post('pembelian/{id}', [dashboardusercontroller::class, 'pembelian'])->name('pembelian')->middleware('web');
    route::post('menu/massUpdate', [dashboardusercontroller::class, 'massUpdate'])->name('menu.massUpdate');
    Route::post('order', [dashboardusercontroller::class, 'order'])->name('order');
    Route::get('riwayatuser', [dashboardusercontroller::class, 'riwayatuser'])->name('riwayatuser');
    Route::get('pesanan', [dashboardusercontroller::class, 'pesanan'])->name('pesanan');
    Route::get('profileuser', [dashboardusercontroller::class, 'profileuser'])->name('profileuser');
    Route::put('profileUpdate/{id}', [dashboardusercontroller::class, 'profileUpdate'])->name('profileUpdate');
    Route::resource('menu' , App\Http\Controllers\dashboardusercontroller::class);
    Route::get('search/{menu}', [dashboardusercontroller::class, 'search'])->name('searching');
    // Route::get('searchKategori/{menu}/{kategori}', [dashboardusercontroller::class, 'searchKategori'])->name('searchingKategori');
    Route::get('caritoko', [dashboardusercontroller::class, 'caritoko'])->name('caritoko');
    Route::get('caripesanan', [dashboardusercontroller::class, 'caripesanan'])->name('caripesanan');
    Route::post('beli', [dashboardusercontroller::class, 'beli'])->name('beli');
    Route::get('konfimasipembelian/{ids}', [dashboardusercontroller::class, 'konfimasipembelian'])->name('konfimasipembelian');
    Route::get('UserKeranjang', [dashboardusercontroller::class, 'Userkeranjang'])->name('Userkeranjang');
    Route::post('tambahKeranjang/{id}', [dashboardusercontroller::class, 'tambahKeranjang'])->name('tambahKeranjang');
    Route::delete('hapusKeranjang', [dashboardusercontroller::class, 'hapusKeranjang'])->name('hapusKeranjang');
    Route::post('updateKeranjang', [dashboardusercontroller::class, 'updateKeranjang'])->name('updateKeranjang');
    Route::post('ulasan/{id}', [dashboardusercontroller::class, 'ulasan'])->name('ulasan');
    Route::get('detailmenu/{id}', [dashboardusercontroller::class, 'detailmenu'])->name('detailmenu');
    Route::get('detailtoko/{id}', [dashboardusercontroller::class, 'detailtoko'])->name('detailtoko');
    Route::patch('tandakanselesai/{id}', [dashboardusercontroller::class, 'tandakanselesai'])->name('tandakanselesai');
    Route::patch('batalkanpesanan/{id}',  [dashboardusercontroller::class, 'batalkanpesanan'])->name('batalkanpesanan');
    Route::patch('pengembaliandana/{id}', [dashboardusercontroller::class, 'pengembaliandana'])->name('pengembaliandana');
    Route::get('notifikasiuser', [dashboardusercontroller::class, 'notifikasiuser'])->name('notifikasiuser');
    Route::post('readnotifikasiuser/{id}', [dashboardusercontroller::class, 'readnotifikasiuser'])->name('readnotifikasiuser');
    Route::get('kategorifilter/{kategori}', [dashboardusercontroller::class, 'kategorifilter'])->name('kategorifilter');
});

Route::middleware(['PenjualMiddleware'])->group(function () {
    Route::resource('/DashboardPenjual', penjualcontroller::class);
    Route::get('pesananpenjual', [penjualcontroller::class, 'pesananpenjual'])->name('pesananpenjual');
    Route::patch('terimapesanan/{id}', [penjualcontroller::class, 'terimapesanan'])->name('terimapesanan');
    Route::get('riwayatpenjual', [penjualcontroller::class, 'riwayatpenjual'])->name('riwayatpenjual');
    Route::patch('tandakantelahselesai/{id}', [penjualcontroller::class, 'tandakantelahselesai'])->name('tandakantelahselesai');
    Route::get('pembayaranpenjual', [penjualcontroller::class, 'pembayaranpenjual'])->name('pembayaranpenjual');
    Route::post('pembayaranpenjual_store', [penjualcontroller::class, 'pembayaranpenjual_store'])->name('pembayaranpenjual_store');
    Route::delete('pembayaranpenjual_destroy/{pembayaranpenjual}', [penjualcontroller::class, 'pembayaranpenjual_destroy'])->name('pembayaranpenjual_destroy');
    Route::patch('tolakpesanan/{id}', [penjualcontroller::class, 'tolakpesanan'])->name('tolakpesanan');
    Route::get('DashboardPenjual_', [penjualcontroller::class, 'DashboardPenjual'])->name('DashboardPenjual_');
    Route::get('pengajuanpenjual', [penjualcontroller::class, 'pengajuanpenjual'])->name('pengajuanpenjual');
    Route::get('pengajuandana', [penjualcontroller::class, 'pengajuandana'])->name('pengajuandana');
    Route::get('profilepenjual', [penjualcontroller::class, 'profilepenjual'])->name('profilepenjual');
    Route::put('profileUpdateP/{id}', [penjualcontroller::class, 'profileUpdateP'])->name('profileUpdateP');
    Route::get('detailmenupen/{id}', [penjualcontroller::class, 'detailmenupen'])->name('detailmenupen');
    Route::get('notifikasipenjual', [penjualcontroller::class, 'notifikasipenjual'])->name('notifikasipenjual');
    Route::post('readnotifikasipenjual/{id}', [penjualcontroller::class, 'readnotifikasipenjual'])->name('readnotifikasipenjual');
    Route::patch('mengajukandana/{id}', [penjualcontroller::class, 'mengajukandana'])->name('mengajukandana');
    Route::get('pjedit/{id}/edit', [penjualcontroller::class,'pjedit'])->name ('pjedit');
    Route::put('pjupdate/{id}', [penjualcontroller::class, 'pjupdate'])->name ('pjupdate');
    Route::get('pembayaranedit/{id}', [penjualcontroller::class, 'pembayaranedit'])->name('pembayaranedit');
    Route::put('pembayaranupdate/{id}',[penjualcontroller::class, 'pembayaranupdate'])->name('pembayaranupdate');
});


Route::post('logout', [logincontroller::class, 'logout'])->name('logout');
});

// Route::middleware(['guest'])->group(function () {

    Route::resource('user', UserController::class);
    Route::resource('penjualrole', rolepenjualcontroller::class);
    // });
    Route::get('/', [Usercontroller::class, 'dashboard'])->name('dashboard');
    Route::get('/forgot-password',[logincontroller::class, 'forgotpassword'])->middleware('guest')->name('password.request');
    Route::post('/forgot-password', [logincontroller::class, 'forgotpassword_store'] )->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', [logincontroller::class, 'resetpassword_token'])->middleware('guest')->name('password.reset');
    Route::post('/reset-password', [logincontroller::class, 'resetpassword'])->middleware('guest')->name('password.update');
    Route::post('calonpenjual_store', [adminpembeliancontroller::class, 'calonpenjual_store'])->name('calonpenjual_store');
    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('authenticate', [logincontroller::class, 'authenticate'])->name('authenticate');
// Route::resource('/test_email', mailcontroller::class);


