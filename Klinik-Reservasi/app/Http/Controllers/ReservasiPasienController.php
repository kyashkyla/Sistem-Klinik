<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\User;

class ReservasiPasienController extends Controller
{
    // ✅ HANDLE GET DAN POST
    public function handleJadwal(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->store($request);
        }
        
        return $this->create();
    }

    // ✅ TAMPILKAN FORM DAFTAR ONLINE
    public function create()
    {
        // 👨‍⚕️ AMBIL SEMUA DOKTER DARI DATABASE
        $dokter = User::where('role', 'dokter')->get();
        
        return view('pasien.jadwal', ['dokter' => $dokter]);
    }

    // ✅ PROSES SUBMIT FORM DAFTAR
    public function store(Request $request)
    {
        $request->validate([
            'keluhan'           => 'required|string|max:255',
            'id_dokter'        => 'required|exists:users,id',
            'tanggal_kunjungan' => 'required|date|after:today',
            'jam_kunjungan'     => 'required|string',
        ], [
            'keluhan.required'           => 'Keluhan harus diisi',
            'id_dokter.required'         => 'Pilih dokter terlebih dahulu',
            'tanggal_kunjungan.required' => 'Tanggal kunjungan harus diisi',
            'tanggal_kunjungan.after'    => 'Tanggal harus lebih dari hari ini',
            'jam_kunjungan.required'     => 'Pilih jam kunjungan',
        ]);

        $user = Auth::user();
        $pasien = Pasien::where('user_id', $user->id)->first();

        if (!$pasien) {
            return back()->withErrors(['error' => 'Data pasien tidak ditemukan']);
        }

        // 📝 SIMPAN RESERVASI
        Reservasi::create([
            'ID_Pasien' => $pasien->ID_Pasien,
            'ID_Dokter' => $request->id_dokter,
            'Tanggal_Reservasi' => now()->toDateString(),
            'Tanggal_Kunjungan' => $request->tanggal_kunjungan,
            'Jam_Kunjungan' => $request->jam_kunjungan,
            'Keluhan' => $request->keluhan,
            'Status' => 'menunggu', // Default status
        ]);

        return redirect()->route('pasien.riwayat')
            ->with('success', 'Reservasi berhasil! Menunggu verifikasi staff klinik.');
    }
}
