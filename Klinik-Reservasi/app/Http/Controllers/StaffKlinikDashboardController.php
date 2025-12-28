<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class StaffKlinikDashboardController extends Controller
{
    public function index()
    {
        // Tampilkan reservasi yang menunggu verifikasi
        $reservasi = Reservasi::with(['pasien', 'dokter'])
            ->where('Status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('staff_klinik.dashboard', compact('reservasi'));
    }

    // View untuk verifikasi reservasi
    public function verifikasi()
    {
        $reservasi = Reservasi::with(['pasien.user', 'dokter'])
            ->where('Status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('staff_klinik.verifikasi', compact('reservasi'));
    }

    // Approve reservasi
    public function approve($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update(['Status' => 'Disetujui']);

        return back()->with('success', 'Reservasi disetujui!');
    }

    // Reject reservasi
    public function reject($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update(['Status' => 'Ditolak']);

        return back()->with('success', 'Reservasi ditolak!');
    }
}