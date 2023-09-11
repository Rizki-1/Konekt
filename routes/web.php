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



    Route::middleware(['AdminMiddleware'])->group(function ()
    {

Route::patch('terima/{id}', [adminpembeliancontroller::class, 'terima'])->name('admin.terima');
Route::patch('tolak/{id}', [adminpembeliancontroller::class, 'tolak'])->name('admin.tolak');
Route::patch('terimapenjual/{id}', [adminpembeliancontroller::class, 'terimapenjual'])->name('terimapenjual');
Route::resource('admin' , App\Http\Controllers\adminpembeliancontroller::class);
Route::get('metodpembayaran', [adminpembeliancontroller::class, 'metodpembayaran'])->name('metodpembayaran');
Route::get('kategori', [adminpembeliancontroller::class, 'kategori'])->name('kategori');
Route::post('kstore', [adminpembeliancontroller::class, 'kstore'])->name('kstore');
Route::delete('kdestroy/{admink}', [adminpembeliancontroller::class, 'kdestroy'])->name('kdestroy');
Route::get('DashboardAdmin', [adminpembeliancontroller::class, 'DashboardAdmin'])->name('DashboardAdmin');
Route::get('calonpenjual', [adminpembeliancontroller::class, 'calonpenjual'])->name('calonpenjual');
    });


Route::middleware(['userMiddleware'])->group(function ()
    {
Route::get('daftartoko', function () { return view('DashboardUser.daftartoko');})->name('daftartoko');
Route::get('keranjang', function () { return view('DashboardUser.keranjang');})->name('keranjang');
Route::get('UserKeranjang', [dashboardusercontroller::class, 'Userkeranjang'])->name('UserKeranjang');
Route::get('pembelian', [dashboardusercontroller::class, 'pembelian'])->name('pembelian')->middleware('web');
Route::get('riwayatuser', [dashboardusercontroller::class, 'riwayatuser'])->name('riwayatuser');
Route::get('pesanan', [dashboardusercontroller::class, 'pesanan'])->name('pesanan');
Route::resource('menu' , App\Http\Controllers\dashboardusercontroller::class);
Route::get('pengajuanuser', [dashboardusercontroller::class, 'pengajuanuser'])->name('pengajuanuser');

});



Route::middleware(['PenjualMiddleware'])->group(function ()
    {
Route::resource('/DashboardPenjual',penjualcontroller::class);
Route::get('pesananpenjual', [penjualcontroller::class, 'pesananpenjual'])->name('pesananpenjual');
Route::patch('terimapesanan/{id}', [penjualcontroller::class, 'terimapesanan'])->name('terimapesanan');
Route::get('riwayatpenjual', [penjualcontroller::class, 'riwayatpenjual'])->name('riwayatpenjual');
Route::patch('tandakantelahselesai/{id}', [penjualcontroller::class, 'tandakantelahselesai'])->name('tandakantelahselesai');
Route::get('pembayaranpenjual', [penjualcontroller::class, 'pembayaranpenjual'])->name('pembayaranpenjual');
Route::post('pembayaranpenjual_store', [penjualcontroller::class, 'pembayaranpenjual_store'])->name('pembayaranpenjual_store');
Route::delete('pembayaranpenjual_destroy/{pembayaranpenjual}', [penjualcontroller::class, 'pembayaranpenjual_destroy'])->name('pembayaranpenjual_destroy');
Route::patch('tolakpesanan/{id}', [penjualcontroller::class, 'tolakpesanan'])->name('tolakpesanan');
Route::get('DashboardPenjual_', [penjualcontroller::class, 'DashboardPenjual'])->name('DashboardPenjual_');
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
Route::get('send-email',[mailcontroller::class, 'index'] );




