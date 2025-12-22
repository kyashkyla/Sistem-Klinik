<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
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

public function storeKunjungan(Request $request)
{
    $request->validate([
        'id_reservasi'      => 'required|exists:reservasi,ID_Reservasi',
        'tanggal_kunjungan' => 'required|date',
        'catatan_dokter'    => 'nullable|string',
    ]);

    HasilKunjungan::create([
        'ID_Reservasi'      => $request->id_reservasi,
        'Tanggal_Kunjungan' => $request->tanggal_kunjungan,
        'Catatan_Dokter'    => $request->catatan_dokter,
    ]);

    return redirect()->back()->with('success', 'Hasil kunjungan berhasil disimpan');
}
}