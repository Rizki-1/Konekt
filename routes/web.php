<?php

use App\Http\Controllers\adminpembeliancontroller;
use App\Http\Controllers\dashboardusercontroller;
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
Route::get('keranjang', function () { return view('DashboardUser.keranjang');})->name('keranjang');
Route::resource('/DashboardPenjual',penjualcontroller::class);
Route::resource('menu' , App\Http\Controllers\dashboardusercontroller::class);
Route::resource('admin' , App\Http\Controllers\adminpembeliancontroller::class);
Route::get('pesananpenjual', [penjualcontroller::class, 'pesananpenjual'])->name('pesananpenjual');
Route::patch('terima/{id}', [adminpembeliancontroller::class, 'terima'])->name('admin.terima');
Route::get('tolak', [adminpembeliancontroller::class, 'tolak'])->name('admin.tolak');
Route::get('pesanan', [dashboardusercontroller::class, 'pesanan'])->name('pesanan');
Route::get('pembelian', [dashboardusercontroller::class, 'pembelian'])->name('pembelian');
Route::patch('terimapesanan/{id}', [penjualcontroller::class, 'terimapesanan'])->name('terimapesanan');
Route::get('riwayatuser', [dashboardusercontroller::class, 'riwayatuser'])->name('riwayatuser');
Route::get('riwayatpenjual', [penjualcontroller::class, 'riwayatpenjual'])->name('riwayatpenjual');
