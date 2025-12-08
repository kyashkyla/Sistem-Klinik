<?php  

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HasilKunjunganController;

Route::resource('hasil_kunjungan', HasilKunjunganController::class);

// Redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// ===== DOKTER =====
Route::prefix('dokter')
    ->middleware(['auth', 'doctor'])
    ->group(function () {
        Route::get('/dashboard', [DashboardDokterController::class, 'dashboard'])
            ->name('dokter.dashboard');

        Route::get('/jadwal', [DashboardDokterController::class, 'jadwal'])
            ->name('dokter.jadwal');

        Route::get('/reservasi', [DashboardDokterController::class, 'reservasi'])
            ->name('dokter.reservasi');

        Route::get('/kunjungan', [DashboardDokterController::class, 'kunjungan'])
            ->name('dokter.kunjungan');

        Route::post('/kunjungan/store', [HasilKunjunganController::class, 'store'])
            ->name('dokter.kunjungan.store');
    });

// ===== ADMIN =====
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

// ===== PASIEN =====
Route::get('/pasien/dashboard', [PasienController::class, 'index'])
    ->middleware(['auth'])
    ->name('pasien.dashboard');
