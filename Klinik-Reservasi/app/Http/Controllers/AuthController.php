<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil → arahkan sesuai role
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'dokter') {
                return redirect('/dokter/dashboard');
            } elseif ($user->role === 'staff') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/pasien/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }
}