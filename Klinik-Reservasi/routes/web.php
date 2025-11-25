<?php  

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Redirect halaman utama ke login
Route::get('/', function () {
    return redirect('/login');
});

// Route login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
