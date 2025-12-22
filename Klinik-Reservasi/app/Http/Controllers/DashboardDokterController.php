<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

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
            ->where('Status', 'Disetujui')
            ->orderBy('Tanggal_Reservasi', 'asc')
            ->get();

        return view('dokter.reservasi', compact('reservasi'));
    }

    public function kunjungan()
    {
        return view('dokter.kunjungan');
    }

    // =========================
    // RIWAYAT (DUMMY / TANPA DB)
    // =========================
    public function riwayat()
    {
        $riwayat = [
            [
                'nama_pasien' => 'Andi Pratama',
                'tanggal'     => '12 Desember 2025',
                'jam'         => '09:30',
                'keluhan'     => 'Demam dan batuk',
                'diagnosa'    => 'ISPA',
                'tindakan'    => 'Obat & istirahat'
            ],
            [
                'nama_pasien' => 'Siti Aminah',
                'tanggal'     => '10 Desember 2025',
                'jam'         => '13:00',
                'keluhan'     => 'Nyeri gigi',
                'diagnosa'    => 'Karies gigi',
                'tindakan'    => 'Penambalan'
            ],
        ];

        return view('dokter.riwayat', compact('riwayat'));
    }

    // =========================
    // NOTIFIKASI (DUMMY)
    // =========================
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