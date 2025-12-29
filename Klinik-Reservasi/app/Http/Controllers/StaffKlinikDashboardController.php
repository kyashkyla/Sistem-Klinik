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

        // Hitung jumlah reservasi yang menunggu verifikasi
        $countPending = Reservasi::where('Status', 'menunggu')->count();

        return view('staff_klinik.dashboard', compact('reservasi', 'countPending'));
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

    // Data pasien yang sudah disetujui
    public function dataPasien()
    {
        $reservasi = Reservasi::with(['pasien.user', 'dokter'])
            ->where('Status', 'Disetujui')
            ->orderBy('Tanggal_Kunjungan', 'desc')
            ->get();

        // Hitung jumlah reservasi yang menunggu verifikasi
        $countPending = Reservasi::where('Status', 'menunggu')->count();

        return view('staff_klinik.Datapasien', compact('reservasi', 'countPending'));
    }

    // Data kunjungan (hasil kunjungan dari dokter)
    public function kunjunganList()
    {
        $hasilKunjungan = \App\Models\HasilKunjungan::with([
            'reservasi' => function ($query) {
                $query->with(['pasien.user', 'dokter']);
            }
        ])
        ->orderBy('Tanggal_Kunjungan', 'desc')
        ->get();

        return view('staff_klinik.kunjungan', compact('hasilKunjungan'));
    }

    // Halaman notifikasi
    public function notifikasi()
    {
        $reservasi = Reservasi::with(['pasien.user', 'dokter'])
            ->where('Status', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->get();

        $countPending = Reservasi::where('Status', 'menunggu')->count();

        return view('staff_klinik.notifikasi', compact('reservasi', 'countPending'));
    }

    // Profil staff
    public function profil()
    {
        return view('staff_klinik.profil');
    }

    // Riwayat reservasi yang sudah disetujui
    public function riwayat()
    {
        $reservasi = Reservasi::with(['pasien.user', 'dokter', 'hasilKunjungan'])
            ->where('Status', 'Disetujui')
            ->orderBy('Tanggal_Kunjungan', 'desc')
            ->get();

        return view('staff_klinik.riwayat', compact('reservasi'));
    }
}