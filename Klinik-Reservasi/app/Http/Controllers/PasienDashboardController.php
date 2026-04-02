<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;
use App\Models\Reservasi;

class PasienDashboardController extends Controller
{
    public function dashboard()
    {
        $pasien = Pasien::find(session('pasien_id'));
        
        // Hitung jumlah reservasi pasien yang menunggu status verifikasi
        $countPending = 0;
        if ($pasien) {
            $countPending = Reservasi::where('ID_Pasien', $pasien->ID_Pasien)
                ->where('Status', 'menunggu')
                ->count();
        }
        
        return view('pasien.dashboard', compact('pasien', 'countPending'));
    }

    public function riwayat()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();

        if (!$pasien) {
            return view('pasien.riwayat', ['riwayat' => []]);
        }

        // Ambil semua reservasi pasien (baik menunggu maupun sudah disetujui)
        $riwayat = Reservasi::with(['dokter', 'hasilKunjungan'])
            ->where('ID_Pasien', $pasien->ID_Pasien)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pasien.riwayat', compact('riwayat'));
    }

    public function profil()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();

        if (!$pasien) {
            $pasien = new Pasien(['Nama' => $user->name, 'Email' => $user->email]);
        }

        // Hitung total kunjungan yang sudah selesai
        $totalKunjungan = Reservasi::where('ID_Pasien', $pasien->ID_Pasien)
            ->where('Status', 'Disetujui')
            ->count();

        return view('pasien.profil', compact('pasien', 'totalKunjungan'));
    }

    public function notifikasi()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();

        if (!$pasien) {
            return view('pasien.berita', ['reservasi' => [], 'countPending' => 0]);
        }

        // Ambil semua reservasi pasien dengan relasi dokter
        $reservasi = Reservasi::with(['dokter'])
            ->where('ID_Pasien', $pasien->ID_Pasien)
            ->orderBy('created_at', 'desc')
            ->get();

        // Hitung reservasi yang masih menunggu verifikasi
        $countPending = Reservasi::where('ID_Pasien', $pasien->ID_Pasien)
            ->where('Status', 'menunggu')
            ->count();

        return view('pasien.berita', compact('reservasi', 'countPending'));
    }
}
