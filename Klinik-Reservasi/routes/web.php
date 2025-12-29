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
        Route::resource('jadwal', JadwalController::class);
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

        Route::get('/reservasi', [DashboardDokterController::class, 'reservasi'])
            ->name('reservasi');

        Route::get('/periksa/{id}', [DashboardDokterController::class, 'periksa'])
            ->name('periksa');

        Route::get('/kunjungan', [DashboardDokterController::class, 'kunjungan'])
            ->name('kunjungan');

        Route::get('/kunjungan/{id}', [DashboardDokterController::class, 'kunjunganDetail'])
            ->name('kunjungan.detail');

        Route::post('/kunjungan/store', [HasilKunjunganController::class, 'store'])
            ->name('kunjungan.store');

        Route::get('/notifikasi', [DashboardDokterController::class, 'notifikasi'])
            ->name('notifikasi');

        Route::get('/profil', [DashboardDokterController::class, 'profil'])
            ->name('profil');
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

        Route::get('/Datapasien', [StaffKlinikDashboardController::class, 'dataPasien'])
            ->name('Datapasien');

        Route::resource('jadwaldokter', JadwalController::class);

        Route::get('/kunjungan', [StaffKlinikDashboardController::class, 'kunjunganList'])
            ->name('kunjungan');

        Route::get('/notifikasi', [StaffKlinikDashboardController::class, 'notifikasi'])
            ->name('notifikasi');

        Route::get('/profil', [StaffKlinikDashboardController::class, 'profil'])
            ->name('profil');

        Route::get('/riwayat', [StaffKlinikDashboardController::class, 'riwayat'])
            ->name('riwayat');
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

        Route::get('/dashboard', [PasienDashboardController::class, 'dashboard'])
            ->name('dashboard');

        // ✅ DAFTAR ONLINE (RESERVASI) - ROUTE UNTUK FORM
        Route::match(['get', 'post'], '/jadwal', [ReservasiPasienController::class, 'handleJadwal'])
            ->name('jadwal');

        Route::get('/dokter', function() {
            $dokter = \App\Models\Dokter::all();
            $jadwal = \App\Models\Jadwal::with('dokter')->where('Status_Slot', 'Tersedia')->get();
            return view('pasien.dokter', compact('dokter', 'jadwal'));
        })
            ->name('dokter');

        Route::get('/darurat', fn() => view('pasien.darurat'))
            ->name('darurat');

        Route::get('/informasi', fn() => view('pasien.informasi'))
            ->name('informasi');

        Route::get('/riwayat', [PasienDashboardController::class, 'riwayat'])
            ->name('riwayat');

        Route::get('/profil', [PasienDashboardController::class, 'profil'])
            ->name('profil');

        Route::get('/diskon', fn() => view('pasien.diskon'))
            ->name('diskon');

        Route::get('/berita', [PasienDashboardController::class, 'notifikasi'])
            ->name('berita');

        // Deprecated - gunakan /jadwal saja
        Route::get('/daftar-online', [ReservasiPasienController::class, 'create'])
            ->name('reservasi.create');

        Route::post('/daftar-online', [ReservasiPasienController::class, 'store'])
            ->name('reservasi.store');
        
        // API untuk ambil jam jadwal dokter
        Route::get('/api/jadwal-dokter/{id_dokter}/{tanggal}', [ReservasiPasienController::class, 'getJadwalDokter'])
            ->name('api.jadwal-dokter');
    });

/*
|--------------------------------------------------------------------------
| RESOURCE
|--------------------------------------------------------------------------
*/
Route::resource('hasil_kunjungan', HasilKunjunganController::class);
