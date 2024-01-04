<?php

use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $paket_wisata = PaketWisata::orderBy('id','desc')->get();
    $daftar_paket = DaftarPaket::orderBy('id','desc')->get();
    return view('welcome', [
        'paket_wisata' => $paket_wisata,
        'daftar_paket' => $daftar_paket
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');
Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');
Route::resource('paket_wisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');
Route::resource('daftar_paket', \App\Http\Controllers\DaftarPaketController::class)->middleware('auth');
Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');
Route::resource('profile-pelanggan', \App\Http\Controllers\ProfilePelangganController::class)->middleware('auth'); 
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'Laporan'])->name('laporan');
Route::get('/download-laporan-pdf', [App\Http\Controllers\LaporanController::class, 'downloadpdf']);
Route::resource('/operator', \App\Http\Controllers\OperatorController::class)->middleware('auth');
Route::get('/bali.blade.php', function () {
    return view('bali');
});
