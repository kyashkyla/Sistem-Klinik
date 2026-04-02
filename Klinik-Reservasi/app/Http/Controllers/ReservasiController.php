<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $data = Reservasi::with(['pasien', 'jadwal'])
            ->orderBy('ID_Reservasi', 'desc')
            ->get();

        return view('reservasi.index', compact('data'));
    }

    public function create()
    {
        return view('reservasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Pasien' => 'required|exists:pasien,ID_Pasien',
            'ID_Jadwal' => 'required|exists:jadwal,ID_Jadwal',
            'Tanggal_Reservasi' => 'required|date',
            'Status' => 'required|string',
        ]);

        Reservasi::create($request->all());

        return redirect()->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Reservasi::with(['pasien', 'jadwal'])->findOrFail($id);
        return view('reservasi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Reservasi::findOrFail($id);
        return view('reservasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Pasien' => 'required|exists:pasien,ID_Pasien',
            'ID_Jadwal' => 'required|exists:jadwal,ID_Jadwal',
            'Tanggal_Reservasi' => 'required|date',
            'Status' => 'required|string',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update($request->all());

        return redirect()->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil dihapus');
    }
}