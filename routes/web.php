<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Petugas\BukuPetugasController;
use App\Http\Controllers\Petugas\DashboardPetugasController;
use App\Http\Controllers\Petugas\DendaPetugasController;
use App\Http\Controllers\Petugas\KelasPetugasController;
use App\Http\Controllers\Petugas\KepsekPetugasController;
use App\Http\Controllers\Petugas\LaporanPetugasController;
use App\Http\Controllers\Petugas\PeminjamanPetugasController;
use App\Http\Controllers\Petugas\PengambalianPetugasController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Petugas\ProfilPetugasController;
use App\Http\Controllers\Petugas\RakPetugasController;
use App\Http\Controllers\Petugas\ScanBarcodePetugasController;
use App\Http\Controllers\Petugas\SiswaPetugasController;
use App\Http\Controllers\Petugas\TentangKamiController;
use App\Http\Controllers\Petugas\IklanController;
use App\Http\Controllers\Petugas\RulePeminjamanController;
use App\Http\Controllers\Petugas\RulePengembalianController;
use App\Http\Controllers\Petugas\LayananController;
use App\Http\Controllers\Petugas\SekolahController;
use App\Http\Controllers\Petugas\ArticleController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('home.index');
Route::get('/profile', [DashboardController::class, 'profile'])->name('home.profile');
Route::get('/tata-tertib', [DashboardController::class, 'tata_tertib'])->name('home.tata');
Route::get('/buku', [DashboardController::class, 'buku'])->name('home.buku');
Route::get('/buku_baru', [DashboardController::class, 'buku_baru'])->name('home.buku_baru');
Route::get('/detail_buku/{id}', [DashboardController::class, 'detail_buku'])->name('home.detail_buku');
Route::get('/buku/cari', [DashboardController::class, 'cari'])->name('home.cari');
Route::get('/request_buku', [DashboardController::class, 'request_buku'])->name('home.request_buku');
Route::get('/kontak', [DashboardController::class, 'kontak'])->name('home.kontak');
Route::get('/tentang-kami', [DashboardController::class, 'visi'])->name('home.visi');
Route::get('/layanan', [DashboardController::class, 'layanan'])->name('home.layanan');
Route::get('/artikel', [DashboardController::class, 'artikel'])->name('home.artikel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:Petugas'])->group(function () {
    Route::get('/petugas/dashboard', [DashboardPetugasController::class, 'index'])->name('petugas.dashboard');

    Route::resource('/petugas/siswa', SiswaPetugasController::class);

    Route::resource('/petugas/kelas', KelasPetugasController::class);

    Route::resource('/petugas/sekolah', SekolahController::class);

    Route::resource('/petugas/rak', RakPetugasController::class);

    Route::resource('/petugas/buku', BukuPetugasController::class);

    Route::resource('/petugas/petugas', PetugasController::class);

    Route::get('/petugas/peminjaman', [PeminjamanPetugasController::class, 'index'])->name('peminjaman.index');
    Route::get('/petugas/peminjaman/scan', [PeminjamanPetugasController::class, 'cek'])->name('peminjaman.scan');
    Route::post('/petugas/peminjaman/pinjam', [PeminjamanPetugasController::class, 'pinjam'])->name('peminjaman.store');

    Route::get('/petugas/pengembalian', [PengambalianPetugasController::class, 'index'])->name('pengembalian.index');
    Route::get('/petugas/pengembalian/scan', [PengambalianPetugasController::class, 'scan'])->name('pengembalian.scan');
    Route::post('/petugas/pengembalian/proses', [PengambalianPetugasController::class, 'proses'])->name('pengembalian.proses');

    Route::get('/petugas/profile', [ProfilPetugasController::class, 'index'])->name('profile.index');
    Route::put('/petugas/profile/edit-profile/{profile}', [ProfilPetugasController::class, 'data'])->name('profile.profile');
    Route::put('/petugas/profile/edit-password/{profile}', [ProfilPetugasController::class, 'password'])->name('profile.password');

    Route::get('/petugas/profile/foto', [ProfilPetugasController::class, 'foto'])->name('profile.foto');
    Route::put('/petugas/profile/foto-update/{profile}', [ProfilPetugasController::class, 'foto_update'])->name('profile.foto_update');

    Route::get('/petugas/laporan', [LaporanPetugasController::class, 'index'])->name('laporan.index');
    Route::get('/petugas/laporan/cetak', [LaporanPetugasController::class, 'cetak_pdf'])->name('laporan.cetak_pdf');
    Route::post('/petugas/laporan/cari', [LaporanPetugasController::class, 'cari_laporan'])->name('laporan.cari_laporan');
    Route::get('/petugas/laporan/siswa-excel', [LaporanPetugasController::class, 'anggota_excel'])->name('laporan.anggota_excel');
    Route::get('/petugas/laporan/siswa-pdf', [LaporanPetugasController::class, 'anggota_pdf'])->name('laporan.anggota_pdf');
    Route::post('/petugas/laporan/siswa-excel-import', [LaporanPetugasController::class, 'import_anggota_excel'])->name('laporan.import_anggota_excel');
    Route::get('/petugas/laporan/buku-excel', [LaporanPetugasController::class, 'buku_excel'])->name('laporan.buku_excel');
    Route::get('/petugas/laporan/buku-pdf', [LaporanPetugasController::class, 'buku_pdf'])->name('laporan.buku_pdf');
    Route::post('/petugas/laporan/buku-excel-import', [LaporanPetugasController::class, 'import_buku_excel'])->name('laporan.import_buku_excel');

    Route::resource('/petugas/denda', DendaPetugasController::class);

    Route::resource('/petugas/kepsek', KepsekPetugasController::class);
    Route::resource('/petugas/tentang-kami', TentangKamiController::class);
    Route::resource('/petugas/iklan', IklanController::class);
    Route::resource('/petugas/rules', RulePeminjamanController::class);
    Route::resource('/petugas/rule-pengembalian', RulePengembalianController::class);
    Route::resource('/petugas/layanan', LayananController::class);
    Route::resource('/petugas/artikel', ArticleController::class);
});