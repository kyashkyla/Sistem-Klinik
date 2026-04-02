<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\HasilKunjungan;

class DashboardDokterController extends Controller
{
    public function dashboard()
    {
        // Get dokter ID dari email user yang login
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            return view('dokter.dashboard', ['countPending' => 0]);
        }

        // Hitung jumlah reservasi yang belum diperiksa
        $countPending = Reservasi::where('ID_Dokter', $dokter->ID_Dokter)
            ->where('Status', 'Disetujui')
            ->whereDoesntHave('hasilKunjungan')
            ->count();

        return view('dokter.dashboard', compact('countPending'));
    }

    public function jadwal()
    {
        return view('dokter.jadwal');
    }

    public function reservasi()
    {
        // Get dokter ID dari email user yang login (karena dokter juga punya email yang sama)
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            return view('dokter.reservasi', ['reservasi' => []]);
        }
        
        // Ambil reservasi yang belum memiliki hasil kunjungan (belum diperiksa)
        $reservasi = Reservasi::with(['pasien', 'jadwal', 'dokter'])
            ->where('ID_Dokter', $dokter->ID_Dokter)
            ->where('Status', 'Disetujui')
            ->whereDoesntHave('hasilKunjungan') // Filter: hanya yang belum punya hasil kunjungan
            ->orderBy('Tanggal_Kunjungan', 'asc')
            ->get();

        return view('dokter.reservasi', compact('reservasi'));
    }

    public function periksa($id)
    {
        // Get dokter ID dari email user yang login
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            abort(403, 'Unauthorized');
        }
        
        // Ambil reservasi berdasarkan ID
        $reservasi = Reservasi::with(['pasien.user', 'jadwal', 'dokter'])
            ->where('ID_Reservasi', $id)
            ->where('ID_Dokter', $dokter->ID_Dokter)
            ->where('Status', 'Disetujui')
            ->firstOrFail();

        return view('dokter.periksa', compact('reservasi'));
    }

    public function kunjungan()
    {
        // Get dokter ID dari email user yang login
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            return view('dokter.kunjungan', ['hasilKunjungan' => []]);
        }
        
        // Ambil hasil kunjungan yang sudah diperiksa oleh dokter ini
        $hasilKunjungan = HasilKunjungan::with(['reservasi.pasien.user'])
            ->whereHas('reservasi', function ($query) use ($dokter) {
                $query->where('ID_Dokter', $dokter->ID_Dokter);
            })
            ->orderBy('Tanggal_Kunjungan', 'desc')
            ->get();

        return view('dokter.kunjungan', compact('hasilKunjungan'));
    }

    public function kunjunganDetail($id)
    {
        // Get dokter ID dari email user yang login
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            abort(403, 'Unauthorized');
        }
        
        // Ambil detail hasil kunjungan
        $hasil = HasilKunjungan::with(['reservasi.pasien.user', 'reservasi.dokter'])
            ->where('ID_Hasil', $id)
            ->whereHas('reservasi', function ($query) use ($dokter) {
                $query->where('ID_Dokter', $dokter->ID_Dokter);
            })
            ->firstOrFail();

        return view('dokter.kunjungan-detail', compact('hasil'));
    }

    public function riwayat()
    {
        // Get dokter ID dari email user yang login
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            return view('dokter.riwayat', ['riwayat' => []]);
        }

        $riwayat = HasilKunjungan::with(['reservasi.pasien.user'])
            ->whereHas('reservasi', function ($query) use ($dokter) {
                $query->where('ID_Dokter', $dokter->ID_Dokter);
            })
            ->orderBy('Tanggal_Kunjungan', 'desc')
            ->get();

        return view('dokter.riwayat', compact('riwayat'));
    }

    public function notifikasi()
    {
        // Get dokter ID dari email user yang login
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            return view('dokter.notifikasi', ['reservasi' => [], 'countPending' => 0]);
        }

        // Ambil reservasi yang belum diperiksa (diurutkan dari terbaru)
        $reservasi = Reservasi::with(['pasien.user', 'dokter'])
            ->where('ID_Dokter', $dokter->ID_Dokter)
            ->where('Status', 'Disetujui')
            ->whereDoesntHave('hasilKunjungan')
            ->orderBy('created_at', 'desc')
            ->get();

        $countPending = $reservasi->count();

        return view('dokter.notifikasi', compact('reservasi', 'countPending'));
    }

    public function profil()
    {
        $dokter = \App\Models\Dokter::where('Email', auth()->user()->email)->first();
        
        if (!$dokter) {
            $dokter = new \App\Models\Dokter(['Nama' => auth()->user()->name, 'Email' => auth()->user()->email]);
        }

        // Hitung total pasien yang sudah diperiksa
        $totalPasien = Reservasi::where('ID_Dokter', $dokter->ID_Dokter)
            ->where('Status', 'Disetujui')
            ->count();

        return view('dokter.profil', compact('dokter', 'totalPasien'));
    }
}