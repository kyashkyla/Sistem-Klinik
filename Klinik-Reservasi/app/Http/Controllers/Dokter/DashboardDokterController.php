<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kunjungan;

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
        return view('dokter.reservasi');
    }

    public function kunjungan()
    {
        return view('dokter.kunjungan'); // Halaman form
    }

    // ✅ Function untuk menyimpan data kunjungan
    public function storeKunjungan(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'nik' => 'required|string',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'keluhan' => 'required|string',
            'diagnosa' => 'required|string',
            'resep' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        Kunjungan::create([
            'nama_pasien'   => $request->nama_pasien,
            'nik'           => $request->nik,
            'umur'          => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keluhan'       => $request->keluhan,
            'diagnosa'      => $request->diagnosa,
            'resep'         => $request->resep,
            'catatan'       => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Data kunjungan berhasil disimpan!');
    }
}