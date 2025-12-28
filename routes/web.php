<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\StaffKlinikDashboardController;
use App\Http\Controllers\VerifikasiReservasiController;
use App\Http\Controllers\HasilKunjunganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\ReservasiController;

/*
|--------------------------------------------------------------------------
| REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect()->route('login'));

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
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
Route::middleware(['auth', 'doctor'])
    ->prefix('dokter')
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
Route::middleware(['auth', 'staff'])
    ->prefix('staff_klinik')
    ->name('staff.')
    ->group(function () {

        Route::get('/dashboard', [StaffKlinikDashboardController::class, 'index'])
            ->name('dashboard');

        // VERIFIKASI RESERVASI
        Route::get('/verifikasi-reservasi', [VerifikasiReservasiController::class, 'index'])
            ->name('verifikasi');

        Route::post('/verifikasi-reservasi/{id}', [VerifikasiReservasiController::class, 'update'])
            ->name('verifikasi.update');

        // KELOLA JADWAL DOKTER
        Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
        Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
        Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

        // DATA PASIEN
        Route::get('/data-pasien', [DataPasienController::class, 'index'])
            ->name('data-pasien');
    });

/*
|--------------------------------------------------------------------------
| PASIEN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'pasien'])
    ->prefix('pasien')
    ->name('pasien.')
    ->group(function () {

        Route::get('/dashboard', fn () => view('pasien.dashboard'))->name('dashboard');
        Route::get('/profil', fn () => view('pasien.profil'))->name('profil');
        Route::get('/jadwal', fn () => view('pasien.jadwal'))->name('jadwal');
        Route::get('/dokter', fn () => view('pasien.dokter'))->name('dokter');
        Route::get('/darurat', fn () => view('pasien.darurat'))->name('darurat');
        Route::get('/informasi', fn () => view('pasien.informasi'))->name('informasi');
        Route::get('/riwayat', fn () => view('pasien.riwayat'))->name('riwayat');
        Route::get('/diskon', fn () => view('pasien.diskon'))->name('diskon');
        Route::get('/berita', fn () => view('pasien.berita'))->name('berita');

        // ================= DAFTAR ONLINE PASIEN =================
        Route::get('/daftar-online', [ReservasiController::class, 'create'])
            ->name('reservasi.create');

        Route::post('/daftar-online', [ReservasiController::class, 'store'])
            ->name('reservasi.store');
    });

/*
|--------------------------------------------------------------------------
| HASIL KUNJUNGAN
|--------------------------------------------------------------------------
*/
Route::resource('hasil_kunjungan', HasilKunjunganController::class);
