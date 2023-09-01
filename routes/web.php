<?php

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
    return view('menu');
});
// Route::get('/DashboardUser', function () {
//     return view('DashboardUser.menu');
// });

// Route::get('/DashboardUser', function () {
//     return view('DashboardUser.menu');
// });
Route::get('daftartoko', function (){return view('DashboardUser.daftartoko')->name('daftartoko');});
Route::get('menu', function (){return view('DashboardUser.menu')->name('menu');});
Route::get('pesanan', function (){ return view('DashboardUser.pesanan')->name('pesanan');});
Route::get('riwayat', function() {return view('DashboardUser.riwayat')->name('riwayat');});
Route::get('keranjang', function() {return view('DashboardUser.keranjang')->name('keranjang');});
Route::resource('/DashboardUser', Usercontroller::class);
