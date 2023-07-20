<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PegawaiController;
use App\Models\Barang;
use Illuminate\Support\Facades\Request;

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
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('home', [HomeController::class, 'index'])->middleware('auth');
Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'authentication']);
Route::post('logout',[AuthController::class, 'logout']);
Route::resource('barang',BarangController::class);
Route::resource('peminjam', PeminjamController::class);

Route::get('peminjam/create/action', [PeminjamController::class, 'action'])->name('peminjam.create.action');

Route::get('pengembalian', [PengembalianController::class, 'pengembalian']);
Route::get('pengembalian/edit/{id}', [PengembalianController::class, 'edit']);
Route::post('pengembalian/update', [PengembalianController::class, 'update'])->name('pengembalianbarang');

Route::resource('pengadaan', PengadaanController::class);
Route::get('stok',[BarangController::class, 'stok']);

Route::resource('pegawai', PegawaiController::class);

Route::any('/getjurusan',[JurusanController::class, 'getjurusan']);
Route::any('/getpegawai',[PegawaiController::class, 'getpegawai']);
Route::any('/getbarang',[BarangController::class, 'getbarang']);

