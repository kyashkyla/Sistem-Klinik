<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class VerifikasiReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['pasien', 'jadwal'])
            ->where('status', 'menunggu')
            ->get();

        // 🔴 INI YANG HARUS DIGANTI
        return view('staff_klinik.verifikasi', compact('reservasis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak'
        ]);

        Reservasi::findOrFail($id)->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Reservasi berhasil diperbarui');
    }
}
