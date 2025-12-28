<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\HasilKunjungan;

class DashboardDokterController extends Controller
{
    public function dashboard()
    {
        return view('dokter.dashboard');
    }

    public function jadwal()
    {
        return view('dokter.jadwal');
    }

    public function reservasi()
    {
        $reservasi = Reservasi::with(['pasien', 'jadwal'])
            ->where('ID_Dokter', auth()->id())
            ->where('Status', 'Disetujui')
            ->orderBy('Tanggal_Reservasi', 'asc')
            ->get();

        return view('dokter.reservasi', compact('reservasi'));
    }

    public function kunjungan()
    {
        $reservasi = Reservasi::with(['pasien.user', 'dokter'])
            ->where('ID_Dokter', auth()->id())
            ->where('Status', 'Disetujui')
            ->orderBy('Tanggal_Kunjungan', 'asc')
            ->get();

        return view('dokter.kunjungan', compact('reservasi'));
    }

    public function riwayat()
    {
        $riwayat = HasilKunjungan::with(['reservasi.pasien.user'])
            ->whereHas('reservasi', function ($query) {
                $query->where('ID_Dokter', auth()->id());
            })
            ->orderBy('Tanggal_Kunjungan', 'desc')
            ->get();

        return view('dokter.riwayat', compact('riwayat'));
    }

    public function notifikasi()
    {
        $notifikasi = [
            [
                'icon'  => '🔔',
                'judul' => 'Reservasi Baru',
                'pesan' => 'Pasien Ahmad Fauzi membuat reservasi baru',
                'waktu' => '5 menit lalu'
            ],
            [
                'icon'  => '⏰',
                'judul' => 'Jadwal Hari Ini',
                'pesan' => 'Anda memiliki 3 jadwal pemeriksaan hari ini',
                'waktu' => '30 menit lalu'
            ],
            [
                'icon'  => '❌',
                'judul' => 'Reservasi Dibatalkan',
                'pesan' => 'Pasien Siti Aminah membatalkan reservasi',
                'waktu' => '2 jam lalu'
            ],
        ];

        return view('dokter.notifikasi', compact('notifikasi'));
    }
}