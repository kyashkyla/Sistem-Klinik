<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Jadwal;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    // Form daftar online
    public function create()
    {
        $jadwals = Jadwal::all();
        return view('pasien.daftar-online', compact('jadwals'));
    }

    // Simpan ke database
    public function store(Request $request)
    {
        $request->validate([
            'ID_Jadwal' => 'required|exists:jadwal,ID_Jadwal',
            'Tanggal_Reservasi' => 'required|date|after_or_equal:today',
            'Keterangan' => 'nullable|string',
        ]);

        $user = Auth::user();

        // Ambil pasien berdasarkan user_id
        $pasien = Pasien::where('user_id', $user->id)->first();

        if (!$pasien) {
            return back()->with('error', 'Data pasien tidak ditemukan.');
        }

        Reservasi::create([
            'ID_Pasien' => $pasien->ID_Pasien,
            'ID_Jadwal' => $request->ID_Jadwal,
            'Tanggal_Reservasi' => $request->Tanggal_Reservasi,
            'Status' => 'Menunggu',
            'Keterangan' => $request->Keterangan,
        ]);

        return redirect()->route('pasien.dashboard')
            ->with('success', 'Reservasi berhasil dibuat!');
    }
}
