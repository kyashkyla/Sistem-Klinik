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
        return view('pasien.dashboard', compact('pasien'));
    }

    public function riwayat()
    {
        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();

        if (!$pasien) {
            return view('pasien.riwayat', ['riwayat' => []]);
        }

        // Ambil semua reservasi yang sudah disetujui untuk pasien ini
        $riwayat = Reservasi::with(['dokter', 'hasilKunjungan'])
            ->where('ID_Pasien', $pasien->ID_Pasien)
            ->where('Status', 'Disetujui') // Hanya yang sudah disetujui
            ->orderBy('Tanggal_Kunjungan', 'desc')
            ->get();

        return view('pasien.riwayat', compact('riwayat'));
    }
}
