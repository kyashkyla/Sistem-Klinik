<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ✅ TAMPILKAN HALAMAN REGISTER
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ✅ PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email|unique:pasien,Email',
            'password' => 'required|min:6|confirmed',
        ]);

        // 1️⃣ BUAT USER RECORD
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'pasien', // 🔐 otomatis pasien
        ]);

        // 2️⃣ BUAT PASIEN RECORD
        Pasien::create([
            'Nama'           => $request->name,
            'Email'          => $request->email,
            'Password'       => Hash::make($request->password),
            'No_Telepon'     => '',
            'Alamat'         => '',
            'Biodata_Diri'   => '',
            'user_id'        => $user->id,
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'staff') {
            return redirect()->route('staff_klinik.dashboard');
        }

        if ($user->role === 'dokter') {
            return redirect()->route('dokter.dashboard');
        }

        return redirect()->route('pasien.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}