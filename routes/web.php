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
    Route::get('/', function () {
        return view('welcome');
    });



Route::middleware(['AdminMiddleware'])->group(function () {

    Route::patch('terima/{id}', [adminpembeliancontroller::class, 'terima'])->name('admin.terima');
    Route::patch('tolak/{id}', [adminpembeliancontroller::class, 'tolak'])->name('admin.tolak');
    Route::patch('terimapenjual/{id}', [adminpembeliancontroller::class, 'terimapenjual'])->name('terimapenjual');
    Route::delete('tolakpenjual/{id}', [adminpembeliancontroller::class, 'tolakpenjual'])->name('tolakpenjual');
    Route::resource('pembelianadmin', App\Http\Controllers\adminpembeliancontroller::class);
    Route::get('metodpembayaran', [adminpembeliancontroller::class, 'metodpembayaran'])->name('metodpembayaran');
    Route::get('kategori', [adminpembeliancontroller::class, 'kategori'])->name('kategori');
    Route::post('kstore', [adminpembeliancontroller::class, 'kstore'])->name('kstore');
    Route::delete('kdestroy/{admink}', [adminpembeliancontroller::class, 'kdestroy'])->name('kdestroy');
    Route::delete('adestroy/{adminmp}', [adminpembeliancontroller::class, 'adestroy'])->name('adestroy');
    Route::get('DashboardAdmin',[adminpembeliancontroller::class, 'DashboardAdmin'])->name('DashboardAdmin');
    Route::get('calonpenjual', [adminpembeliancontroller::class, 'calonpenjual'])->name('calonpenjual');
    Route::get('pengajuanpembeliad', [adminpembeliancontroller::class, 'pengajuanpembeliad'])->name('pengajuanpembeliad');
    Route::get('pengajuanpenjualad', [adminpembeliancontroller::class, 'pengajuanpenjualad'])->name('pengajuanpenjualad');
});


Route::middleware(['userMiddleware'])->group(function ()
    {
    Route::get('daftartoko', [dashboardusercontroller::class,'daftartoko'])->name('daftartoko');
    Route::post('pembelian/{id}', [dashboardusercontroller::class, 'pembelian'])->name('pembelian')->middleware('web');
    Route::post('order', [dashboardusercontroller::class, 'order'])->name('order');
    Route::get('riwayatuser', [dashboardusercontroller::class, 'riwayatuser'])->name('riwayatuser');
    Route::get('pesanan', [dashboardusercontroller::class, 'pesanan'])->name('pesanan');
    Route::get('profileuser', [dashboardusercontroller::class, 'profileuser'])->name('profileuser');
    Route::resource('menu' , App\Http\Controllers\dashboardusercontroller::class);
    Route::get('/menu/search', [dashboardusercontroller::class, 'search'])->name('menu.search');
    Route::post('beli', [dashboardusercontroller::class, 'beli'])->name('beli');
    Route::get('konfimasipembelian/{id?}', [dashboardusercontroller::class, 'konfimasipembelian'])->name('konfimasipembelian');
    Route::get('UserKeranjang', [dashboardusercontroller::class, 'Userkeranjang'])->name('Userkeranjang');
    Route::post('tambahKeranjang/{id}', [dashboardusercontroller::class, 'tambahKeranjang'])->name('tambahKeranjang');
    Route::delete('hapusKeranjang', [dashboardusercontroller::class, 'hapusKeranjang'])->name('hapusKeranjang');
    Route::post('ulasan', [dashboardusercontroller::class, 'ulasan'])->name('ulasan');
    Route::get('detailmenu', [dashboardusercontroller::class, 'detailmenu'])->name('detailmenu');
    Route::patch('tandakanselesai/{id}', [dashboardusercontroller::class, 'tandakanselesai'])->name('tandakanselesai');

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
});


Route::post('logout', [logincontroller::class, 'logout'])->name('logout');
});
Route::get('/forgot-password',[logincontroller::class, 'forgotpassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [logincontroller::class, 'forgotpassword_store'] )->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [logincontroller::class, 'resetpassword_token'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [logincontroller::class, 'resetpassword'])->middleware('guest')->name('password.update');
Route::post('calonpenjual_store', [adminpembeliancontroller::class, 'calonpenjual_store'])->name('calonpenjual_store');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::resource('penjualrole', rolepenjualcontroller::class);
Route::post('authenticate', [logincontroller::class, 'authenticate'])->name('authenticate');
Route::resource('user', UserController::class);



