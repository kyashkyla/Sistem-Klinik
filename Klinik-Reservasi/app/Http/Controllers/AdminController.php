<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Reservasi;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPasien = Pasien::count();
        $totalDokter = User::where('role', 'dokter')->count();
        $reservasiMenunggu = Reservasi::where('Status', 'menunggu')->count();
        $reservasiDisetujui = Reservasi::where('Status', 'Disetujui')->count();

        return view('admin.dashboard', compact(
            'totalPasien',
            'totalDokter',
            'reservasiMenunggu',
            'reservasiDisetujui'
        ));
    }
}
