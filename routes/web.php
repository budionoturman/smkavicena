<?php

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PengembalianController;

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
Route::any('/kembalikan/{id}',[PengembalianController::class, 'kembalikan']);
Route::any('/storekembali',[PengembalianController::class, 'storekembali']);
Route::any('/proses/{id}',[PeminjamController::class, 'proses']);

Route::resource('kategori', KategoriController::class);
// Route::any('/kategori', [KategoriController::class, 'index']);
// Route::any('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
// Route::get('/kategori-add', [KategoriController::class, 'add']);
// Route::any('/kategori-edit/{id}', [KategoriController::class, 'edit']);
// Route::any('/kategori-delete/{id}', [KategoriController::class, 'delete']);

Route::any('history', [PengembalianController::class, 'history']);
Route::any('history', [PengembalianController::class, 'history']);

Route::any('history', [PengembalianController::class, 'history']);

Route::resource('pengadaan', PengadaanController::class);
Route::get('stok',[BarangController::class, 'stok']);

Route::resource('pegawai', PegawaiController::class);

Route::any('/getjurusan',[JurusanController::class, 'getjurusan']);
Route::any('/getpegawai',[PegawaiController::class, 'getpegawai']);
Route::any('/getbarang',[BarangController::class, 'getbarang']);


//pdf pengadaan barang
Route::get('pdf',[PengadaanController::class, 'pdf']);
Route::get('pdf/cetak',[PengadaanController::class, 'cetakPdf']);

