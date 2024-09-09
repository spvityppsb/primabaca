<?php

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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Petugas\BukuPetugasController;
use App\Http\Controllers\Petugas\RequestBukuController;
use App\Http\Controllers\Petugas\RequestAnggotaPetugasController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])->name('home.index');

// Grouping for dashboard, profile, and other public routes
Route::group(['prefix' => 'home'], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home.index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('home.profile');
    Route::get('/tata-tertib', [DashboardController::class, 'tata_tertib'])->name('home.tata');
    Route::get('/buku', [DashboardController::class, 'buku'])->name('home.buku');
    Route::get('/buku_baru', [DashboardController::class, 'buku_baru'])->name('home.buku_baru');
    Route::get('/detail_buku/{id}', [DashboardController::class, 'detail_buku'])->name('home.detail_buku');
    Route::get('/buku/cari', [DashboardController::class, 'cari'])->name('home.cari');
    Route::get('/request_buku', [DashboardController::class, 'request_buku'])->name('home.request_buku');
    Route::post('/request_buku_store', [DashboardController::class, 'request_buku_store'])
        ->name('home.request_buku_store')
        ->middleware('throttle:10,1'); // Rate limiting: 10 requests per minute
    Route::get('/kontak', [DashboardController::class, 'kontak'])->name('home.kontak');
    Route::get('/tentang-kami', [DashboardController::class, 'visi'])->name('home.visi');
    Route::get('/layanan', [DashboardController::class, 'layanan'])->name('home.layanan');
    Route::get('/artikel', [DashboardController::class, 'artikel'])->name('home.artikel');
    Route::get('/request_anggota', [DashboardController::class, 'request_anggota'])->name('home.request_anggota');
    Route::post('/request_anggota_store', [DashboardController::class, 'request_anggota_store'])
        ->name('home.request_anggota_store')
        ->middleware('throttle:10,1'); // Rate limiting: 10 requests per minute
});

Auth::routes();

// Protect all Petugas routes with auth middleware and user-access restriction
Route::middleware(['auth', 'user-access:Petugas'])->prefix('petugas')->group(function () {
    Route::get('/dashboard', [DashboardPetugasController::class, 'index'])->name('petugas.dashboard');

    Route::resources([
        'siswa' => SiswaPetugasController::class,
        'kelas' => KelasPetugasController::class,
        'sekolah' => SekolahController::class,
        'rak' => RakPetugasController::class,
        'buku' => BukuPetugasController::class,
        'petugas' => PetugasController::class,
        'denda' => DendaPetugasController::class,
        'kepsek' => KepsekPetugasController::class,
        'tentang-kami' => TentangKamiController::class,
        'iklan' => IklanController::class,
        'rules' => RulePeminjamanController::class,
        'rule-pengembalian' => RulePengembalianController::class,
        'layanan' => LayananController::class,
        'artikel' => ArticleController::class,
    ]);

    // Route Peminjaman and Pengembalian with additional protections
    Route::group(['prefix' => 'peminjaman'], function () {
        Route::get('/', [PeminjamanPetugasController::class, 'index'])->name('peminjaman.index');
        Route::get('/scan', [PeminjamanPetugasController::class, 'cek'])->name('peminjaman.scan');
        Route::post('/pinjam', [PeminjamanPetugasController::class, 'pinjam'])->name('peminjaman.store');
    });

    Route::group(['prefix' => 'pengembalian'], function () {
        Route::get('/', [PengambalianPetugasController::class, 'index'])->name('pengembalian.index');
        Route::get('/scan', [PengambalianPetugasController::class, 'scan'])->name('pengembalian.scan');
        Route::post('/proses', [PengambalianPetugasController::class, 'proses'])->name('pengembalian.proses');
    });

    // Profile routes
    Route::get('/profile', [ProfilPetugasController::class, 'index'])->name('profile.index');
    Route::put('/profile/edit-profile/{profile}', [ProfilPetugasController::class, 'data'])->name('profile.profile');
    Route::put('/profile/edit-password/{profile}', [ProfilPetugasController::class, 'password'])->name('profile.password');
    Route::get('/profile/foto', [ProfilPetugasController::class, 'foto'])->name('profile.foto');
    Route::put('/profile/foto-update/{profile}', [ProfilPetugasController::class, 'foto_update'])->name('profile.foto_update');

    // Laporan routes
    Route::get('/laporan', [LaporanPetugasController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanPetugasController::class, 'cetak_pdf'])->name('laporan.cetak_pdf');
    Route::post('/laporan/cari', [LaporanPetugasController::class, 'cari_laporan'])->name('laporan.cari_laporan');
    Route::get('/laporan/siswa-excel', [LaporanPetugasController::class, 'anggota_excel'])->name('laporan.anggota_excel');
    Route::get('/laporan/siswa-pdf', [LaporanPetugasController::class, 'anggota_pdf'])->name('laporan.anggota_pdf');
    Route::post('/laporan/siswa-excel-import', [LaporanPetugasController::class, 'import_anggota_excel'])->name('laporan.import_anggota_excel');
    Route::get('/laporan/buku-excel', [LaporanPetugasController::class, 'buku_excel'])->name('laporan.buku_excel');
    Route::get('/laporan/buku-pdf', [LaporanPetugasController::class, 'buku_pdf'])->name('laporan.buku_pdf');
    Route::post('/laporan/buku-excel-import', [LaporanPetugasController::class, 'import_buku_excel'])->name('laporan.import_buku_excel');

    // Request buku
    Route::get('/request-buku', [RequestBukuController::class, 'index'])->name('request_buku');


    // Request anggota
    Route::get('/request-anggota', [RequestAnggotaPetugasController::class, 'index'])->name('request_anggota');
});
