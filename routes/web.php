<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\StaffKlinikDashboardController;
use App\Http\Controllers\VerifikasiReservasiController;
use App\Http\Controllers\HasilKunjunganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DataPasienController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| DOKTER
|--------------------------------------------------------------------------
*/
Route::prefix('dokter')
    ->middleware(['auth', 'doctor'])
    ->name('dokter.')
    ->group(function () {

        Route::get('/dashboard', [DashboardDokterController::class, 'dashboard'])->name('dashboard');
        Route::get('/jadwal', [DashboardDokterController::class, 'jadwal'])->name('jadwal');
        Route::get('/reservasi', [DashboardDokterController::class, 'reservasi'])->name('reservasi');
        Route::get('/kunjungan', [DashboardDokterController::class, 'kunjungan'])->name('kunjungan');

        Route::post('/kunjungan/store', [HasilKunjunganController::class, 'store'])
            ->name('kunjungan.store');
    });

/*
|--------------------------------------------------------------------------
| STAFF KLINIK
|--------------------------------------------------------------------------
*/
Route::prefix('staff_klinik')
    ->middleware(['auth', 'staff'])
    ->name('staff.')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', [StaffKlinikDashboardController::class, 'index'])
            ->name('dashboard');

        // ================= VERIFIKASI RESERVASI =================
        Route::get('/verifikasi-reservasi', [VerifikasiReservasiController::class, 'index'])
            ->name('verifikasi');

        Route::post('/verifikasi-reservasi/{id}', [VerifikasiReservasiController::class, 'update'])
            ->name('verifikasi.update');

        // ================= KELOLA JADWAL DOKTER =================
        Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
        Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

        // ================= DATA PASIEN (AKTIF) =================
        Route::get('/data-pasien', [DataPasienController::class, 'index'])
            ->name('data-pasien');
    });

/*
|--------------------------------------------------------------------------
| PASIEN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'pasien'])->group(function () {

    Route::get('/pasien/dashboard', fn () => view('pasien.dashboard'))->name('pasien.dashboard');
    Route::get('/pasien/profil', fn () => view('pasien.profil'))->name('profil');
    Route::get('/pasien/jadwal', fn () => view('pasien.jadwal'))->name('pasien.jadwal');
    Route::get('/pasien/dokter', fn () => view('pasien.dokter'))->name('pasien.dokter');
    Route::get('/pasien/darurat', fn () => view('pasien.darurat'))->name('darurat');
    Route::get('/pasien/informasi', fn () => view('pasien.informasi'))->name('data.umum');
    Route::get('/pasien/home', fn () => view('pasien.dashboard'))->name('home');
    Route::get('/pasien/riwayat', fn () => view('pasien.riwayat'))->name('riwayat.pasien');
    Route::get('/pasien/diskon', fn () => view('pasien.diskon'))->name('diskon');
    Route::get('/pasien/berita', fn () => view('pasien.berita'))->name('berita');
    Route::get('/pasien/akun', fn () => view('pasien.profil'))->name('profil.pasien');
});

/*
|--------------------------------------------------------------------------
| HASIL KUNJUNGAN
|--------------------------------------------------------------------------
*/
Route::resource('hasil_kunjungan', HasilKunjunganController::class);
