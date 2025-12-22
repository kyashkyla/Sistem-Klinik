<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\StaffKlinikDashboardController;
use App\Http\Controllers\HasilKunjunganController;

Route::resource('hasil_kunjungan', HasilKunjunganController::class);

// Redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== DOKTER =====
Route::prefix('dokter')
    ->middleware(['auth', 'doctor'])
    ->group(function () {

        Route::get('/dashboard', [DashboardDokterController::class, 'dashboard'])
            ->name('dokter.dashboard');

        Route::get('/riwayat', [DashboardDokterController::class, 'riwayat'])
            ->name('dokter.riwayat');

        Route::get('/jadwal', [DashboardDokterController::class, 'jadwal'])
            ->name('dokter.jadwal');

        Route::get('/reservasi', [DashboardDokterController::class, 'reservasi'])
            ->name('dokter.reservasi');

        Route::get('/kunjungan', [DashboardDokterController::class, 'kunjungan'])
            ->name('dokter.kunjungan');

        Route::post('/kunjungan/store', [HasilKunjunganController::class, 'store'])
            ->name('dokter.kunjungan.store');

        Route::get('/notifikasi', [DashboardDokterController::class, 'notifikasi'])
            ->name('dokter.notifikasi');
    });


// ===== STAFF =====
Route::prefix('staff_klinik')->name('staff.')->group(function () {

    Route::get('/dashboard', function () {
        return view('staff_klinik.dashboard');
    })->name('dashboard');

    // sesuai file: Datapasien.blade.php
    Route::get('/Datapasien', function () {
        return view('staff_klinik.Datapasien');
    })->name('Datapasien');

    // sesuai file: verifikasi.blade.php
    Route::get('/verifikasi', function () {
        $reservasis = []; // biar tidak error
        return view('staff_klinik.verifikasi', compact('reservasis'));
    })->name('verifikasi');

    // sesuai file: jadwaldokter.blade.php
    Route::get('/jadwaldokter', function () {
        return view('staff_klinik.jadwaldokter');
    })->name('jadwaldokter');

    // sesuai file: kunjungan.blade.php
    Route::get('/kunjungan', function () {
        return view('staff_klinik.kunjungan');
    })->name('kunjungan');

    // sesuai file: riwayat.blade.php
    Route::get('/riwayat', function () {
        return view('staff_klinik.riwayat');
    })->name('riwayat');
});


// ===== PASIEN =====
Route::middleware(['auth', 'pasien'])
    ->prefix('pasien')
    ->name('pasien.')
    ->group(function () {

        Route::get('/dashboard', fn() => view('pasien.dashboard'))
            ->name('dashboard');

        Route::get('/jadwal', fn() => view('pasien.jadwal'))
            ->name('jadwal');

        Route::get('/dokter', fn() => view('pasien.dokter'))
            ->name('dokter');

        Route::get('/darurat', fn() => view('pasien.darurat'))
            ->name('darurat');

        Route::get('/informasi', fn() => view('pasien.informasi'))
            ->name('informasi');

        Route::get('/riwayat', fn() => view('pasien.riwayat'))
            ->name('riwayat');

        Route::get('/diskon', fn() => view('pasien.diskon'))
            ->name('diskon');

        Route::get('/berita', fn() => view('pasien.berita'))
            ->name('berita');

        Route::get('/profil', fn() => view('pasien.profil'))
            ->name('profil');
    });
