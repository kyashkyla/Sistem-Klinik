<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardDokterController;
use App\Http\Controllers\StaffKlinikDashboardController;
use App\Http\Controllers\HasilKunjunganController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ReservasiPasienController;
use App\Http\Controllers\PasienDashboardController;
use App\Http\Controllers\VerifikasiReservasiController;
use App\Http\Controllers\JadwalController;

/*
|--------------------------------------------------------------------------
| Redirect Awal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

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
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::resource('reservasi', ReservasiController::class);
    });

/*
|--------------------------------------------------------------------------
| DOKTER
|--------------------------------------------------------------------------
*/
Route::prefix('dokter')
    ->middleware(['auth', 'doctor'])
    ->name('dokter.')
    ->group(function () {

        Route::get('/dashboard', [DashboardDokterController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/riwayat', [DashboardDokterController::class, 'riwayat'])
            ->name('riwayat');

        Route::get('/jadwal', [DashboardDokterController::class, 'jadwal'])
            ->name('jadwal');

        // 👉 INI YANG DIPAKAI UNTUK RESERVASI
        Route::get('/reservasi', [DashboardDokterController::class, 'reservasi'])
            ->name('reservasi');

        Route::get('/kunjungan', [DashboardDokterController::class, 'kunjungan'])
            ->name('kunjungan');

        Route::post('/kunjungan/store', [HasilKunjunganController::class, 'store'])
            ->name('kunjungan.store');

        Route::get('/notifikasi', [DashboardDokterController::class, 'notifikasi'])
            ->name('notifikasi');
    });

/*
|--------------------------------------------------------------------------
| STAFF KLINIK
|--------------------------------------------------------------------------
*/
Route::prefix('staff_klinik')
    ->middleware(['auth', 'staff'])
    ->name('staff_klinik.')
    ->group(function () {

        Route::get('/dashboard', [StaffKlinikDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/verifikasi', [StaffKlinikDashboardController::class, 'verifikasi'])
            ->name('verifikasi');

        Route::post('/approve/{id}', [StaffKlinikDashboardController::class, 'approve'])
            ->name('approve');

        Route::post('/reject/{id}', [StaffKlinikDashboardController::class, 'reject'])
            ->name('reject');

        Route::get('/Datapasien', function () {
            return view('staff_klinik.Datapasien');
        })->name('Datapasien');

        Route::get('/jadwaldokter', function () {
            return view('staff_klinik.jadwaldokter');
        })->name('jadwaldokter');

        Route::get('/kunjungan', function () {
            return view('staff_klinik.kunjungan');
        })->name('kunjungan');

        Route::get('/riwayat', function () {
            return view('staff_klinik.riwayat');
        })->name('riwayat');
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

        Route::get('/dashboard', fn() => view('pasien.dashboard'))
            ->name('dashboard');

        // ✅ DAFTAR ONLINE (RESERVASI) - ROUTE UNTUK FORM
        Route::match(['get', 'post'], '/jadwal', [ReservasiPasienController::class, 'handleJadwal'])
            ->name('jadwal');

        Route::get('/dokter', fn() => view('pasien.dokter'))
            ->name('dokter');

        Route::get('/darurat', fn() => view('pasien.darurat'))
            ->name('darurat');

        Route::get('/informasi', fn() => view('pasien.informasi'))
            ->name('informasi');

        Route::get('/riwayat', [PasienDashboardController::class, 'riwayat'])
            ->name('riwayat');

        Route::get('/diskon', fn() => view('pasien.diskon'))
            ->name('diskon');

        Route::get('/berita', fn() => view('pasien.berita'))
            ->name('berita');

        Route::get('/profil', fn() => view('pasien.profil'))
            ->name('profil');

        // Deprecated - gunakan /jadwal saja
        Route::get('/daftar-online', [ReservasiPasienController::class, 'create'])
            ->name('reservasi.create');

        Route::post('/daftar-online', [ReservasiPasienController::class, 'store'])
            ->name('reservasi.store');
    });

/*
|--------------------------------------------------------------------------
| RESOURCE
|--------------------------------------------------------------------------
*/
Route::resource('jadwal', JadwalController::class);
Route::resource('hasil_kunjungan', HasilKunjunganController::class);
