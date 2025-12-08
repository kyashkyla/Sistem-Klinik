<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role) {
                case 'dokter':
                    return redirect()->route('dokter.dashboard');

                case 'admin':
                    return redirect()->route('admin.dashboard');

                case 'pasien':
                default:
                    return redirect()->route('pasien.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }
}