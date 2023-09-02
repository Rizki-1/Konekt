<?php

use App\Http\Controllers\adminpembeliancontroller;
use App\Http\Controllers\penjualcontroller;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('daftartoko', function () { return view('DashboardUser.daftartoko');})->name('daftartoko');
Route::get('pesanan', function () {return view('DashboardUser.pesanan');})->name('pesanan');
Route::get('riwayat', function () { return view('DashboardUser.riwayat');})->name('riwayat');
Route::get('keranjang', function () { return view('DashboardUser.keranjang');})->name('keranjang');
Route::resource('/DashboardPenjual',penjualcontroller::class);
Route::resource('menu' , App\Http\Controllers\dashboardusercontroller::class);
Route::resource('admin' , App\Http\Controllers\adminpembeliancontroller::class);
Route::get('pesananpenjual', [penjualcontroller::class, 'pesananpenjual'])->name('pesananpenjual');
Route::patch('terima/{id}', [adminpembeliancontroller::class, 'terima'])->name('admin.terima');
Route::get('tolak', [adminpembeliancontroller::class, 'tolak'])->name('admin.tolak');
