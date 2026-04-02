<?php

namespace App\Http\Controllers;

use App\Models\HasilKunjungan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class HasilKunjunganController extends Controller
{
    public function index()
    {
        $data = HasilKunjungan::with('reservasi')->get();
        return view('hasil_kunjungan.index', compact('data'));
    }

    public function create()
    {
        $reservasi = Reservasi::all();
        return view('hasil_kunjungan.create', compact('reservasi'));
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'ID_Reservasi' => 'required|exists:reservasi,ID_Reservasi',
            'Catatan_Dokter' => 'required|string',
            'Tanggal_Kunjungan' => 'required|date'
        ]);
        
        // Jika Tanggal_Kunjungan kosong, ambil dari reservasi
        $data = $request->all();
        
        if (empty($data['Tanggal_Kunjungan'])) {
            $reservasi = Reservasi::findOrFail($data['ID_Reservasi']);
            $data['Tanggal_Kunjungan'] = $reservasi->Tanggal_Kunjungan;
        }
        
        HasilKunjungan::create($data);
        return redirect()->route('dokter.kunjungan')->with('success', 'Hasil pemeriksaan berhasil disimpan!');
    }

    public function show($id)
    {
        $data = HasilKunjungan::with('reservasi')->findOrFail($id);
        return view('hasil_kunjungan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = HasilKunjungan::findOrFail($id);
        $reservasi = Reservasi::all();
        return view('hasil_kunjungan.edit', compact('data', 'reservasi'));
    }

    public function update(Request $request, $id)
    {
        $data = HasilKunjungan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('hasil_kunjungan.index');
    }

    public function destroy($id)
    {
        HasilKunjungan::destroy($id);
        return redirect()->route('hasil_kunjungan.index');
    }
}
