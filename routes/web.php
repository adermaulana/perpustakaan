<?php

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
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
    $total_buku = Buku::count();
    $buku_dipinjam = Peminjaman::where('status', 'dipinjam')->count();

    return view('index', [
        'title' => 'Perpustakaan Sekolah XX',
        'active' => 'home',
        'total_buku' => $total_buku,
        'buku_dipinjam' => $buku_dipinjam,
    ]);
});

Route::get('/dashboard', function () {
    $total_buku = Buku::count();
    $total_kategori = Kategori::count();
    $buku_dipinjam = Peminjaman::where('status', 'dipinjam')->count();
    $buku_dikembalikan = Peminjaman::where('status', 'dikembalikan')->count();
    $total_anggota = Anggota::count();
    return view('dashboard.index', [
        'title' => 'Admin Perpustakaan Sekolah XX',
        'total_buku' => $total_buku,
        'buku_dipinjam' => $buku_dipinjam,
        'buku_dikembalikan' => $buku_dikembalikan,
        'total_anggota' => $total_anggota,
        'total_kategori' => $total_kategori,
    ]);
})->middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/katalog', [KatalogController::class, 'katalog'])->name('books.search');
Route::get('/katalog/detail/{buku:judul}', [KatalogController::class, 'detail'])->name('katalog.detail');

//Kategori
Route::get('dashboard/buku/kategori', [KategoriController::class, 'index']);
Route::get('dashboard/buku/kategori/tambah', [KategoriController::class, 'tambah']);
Route::post('dashboard/buku/kategori/tambah', [KategoriController::class, 'proses'])->name('tambah.kategori');
Route::get('dashboard/buku/kategori/{kategori}/edit', [KategoriController::class, 'edit']);
Route::put('dashboard/buku/kategori/{kategori}/edit', [KategoriController::class, 'update'])->name('edit.kategori');
Route::get('dashboard/buku/kategori/{kategori}/delete', [KategoriController::class, 'hapus']);

//Buku
Route::get('dashboard/buku', [BukuController::class, 'index']);
Route::get('dashboard/buku/tambah', [BukuController::class, 'tambah']);
Route::post('dashboard/buku/tambah', [BukuController::class, 'proses'])->name('tambah.buku');
Route::get('dashboard/buku/{buku}/edit', [BukuController::class, 'edit']);
Route::put('dashboard/buku/{buku}/edit', [BukuController::class, 'update'])->name('edit.buku');
Route::get('dashboard/buku/{buku}/delete', [BukuController::class, 'hapus']);

//Anggota
Route::get('dashboard/anggota', [AnggotaController::class, 'index']);
Route::get('/dashboard/anggota/{id}/cetak-kartu', [AnggotaController::class, 'cetakKartu']);
Route::get('dashboard/anggota/tambah', [AnggotaController::class, 'tambah']);
Route::post('dashboard/anggota/tambah', [AnggotaController::class, 'proses'])->name('tambah.anggota');
Route::get('dashboard/anggota/{anggota}/edit', [AnggotaController::class, 'edit']);
Route::put('dashboard/anggota/{anggota}/edit', [AnggotaController::class, 'update'])->name('edit.anggota');
Route::get('dashboard/anggota/{anggota}/delete', [AnggotaController::class, 'hapus']);

//Peminjaman
Route::get('dashboard/peminjaman', [PeminjamanController::class, 'index']);
Route::get('dashboard/peminjaman/tambah', [PeminjamanController::class, 'tambah']);
Route::post('dashboard/peminjaman/tambah', [PeminjamanController::class, 'proses'])->name('tambah.peminjaman');
Route::get('dashboard/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit']);
Route::put('dashboard/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'update'])->name('edit.peminjaman');
Route::get('dashboard/peminjaman/{peminjaman}/delete', [PeminjamanController::class, 'hapus']);

//Pengembalian
Route::get('dashboard/pengembalian', [PengembalianController::class, 'index']);
Route::put('dashboard/pengembalian/{peminjaman}', [PengembalianController::class, 'kembali'])->name('pengembalian.buku');
Route::get('dashboard/pengembalian/{peminjaman}/delete', [PengembalianController::class, 'hapus']);
