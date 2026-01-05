<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dokter;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::with('dokter')->get();

        // Cek apakah diakses dari staff_klinik, admin, atau jalur public
        if (request()->path() === 'staff_klinik/jadwaldokter') {
            // ambil jumlah notifikasi pending untuk staff
            $countPending = Reservasi::where('Status', 'menunggu')->count();
            return view('staff_klinik.jadwaldokter', compact('data', 'countPending'));
        } elseif (str_contains(request()->path(), 'admin')) {
            return view('admin.jadwal_index', compact('data'));
        }

        return view('jadwal.index', compact('data'));
    }

    public function create()
    {
        $dokter = Dokter::all();
        
        // Cek apakah diakses dari staff_klinik, admin, atau jalur public
        if (request()->path() === 'staff_klinik/jadwaldokter/create') {
            return view('staff_klinik.jadwaldokter_create', compact('dokter'));
        } elseif (str_contains(request()->path(), 'admin')) {
            return view('admin.jadwal_create', compact('dokter'));
        }
        
        return view('jadwal.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ID_Dokter' => 'required|exists:dokter,ID_Dokter',
            'Hari' => 'required|integer|between:1,7',
            'Jam_Mulai' => 'required|date_format:H:i',
            'Jam_Selesai' => 'required|date_format:H:i|after:Jam_Mulai',
            'Status_Slot' => 'required|in:Tersedia,Penuh'
        ]);

        Jadwal::create($validated);
        
        // Redirect sesuai dengan asal request
        $referer = request()->header('referer') ?? '';
        if (str_contains($referer, 'staff_klinik')) {
            return redirect()->route('staff_klinik.jadwaldokter.index')->with('success', 'Jadwal berhasil ditambahkan');
        } elseif (str_contains($referer, 'admin')) {
            return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
        }
        
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Jadwal::with('dokter')->findOrFail($id);
        return view('jadwal.show', compact('data'));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dokter = Dokter::all();
        
        // Cek apakah diakses dari staff_klinik, admin, atau jalur public
        if (str_contains(request()->path(), 'staff_klinik')) {
            return view('staff_klinik.jadwaldokter_edit', compact('jadwal', 'dokter'));
        } elseif (str_contains(request()->path(), 'admin')) {
            return view('admin.jadwal_edit', compact('jadwal', 'dokter'));
        }
        
        return view('jadwal.edit', compact('jadwal', 'dokter'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'ID_Dokter' => 'required|exists:dokter,ID_Dokter',
            'Hari' => 'required|integer|between:1,7',
            'Jam_Mulai' => 'required|date_format:H:i',
            'Jam_Selesai' => 'required|date_format:H:i|after:Jam_Mulai',
            'Status_Slot' => 'required|in:Tersedia,Penuh'
        ]);

        $data = Jadwal::findOrFail($id);
        $data->update($validated);
        
        // Redirect sesuai dengan asal request
        $referer = request()->header('referer') ?? '';
        if (str_contains($referer, 'staff_klinik')) {
            return redirect()->route('staff_klinik.jadwaldokter.index')->with('success', 'Jadwal berhasil diperbarui');
        } elseif (str_contains($referer, 'admin')) {
            return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
        }
        
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);
        
        // Redirect sesuai dengan asal request
        $referer = request()->header('referer') ?? '';
        if (str_contains($referer, 'staff_klinik')) {
            return redirect()->route('staff_klinik.jadwaldokter.index')->with('success', 'Jadwal berhasil dihapus');
        } elseif (str_contains($referer, 'admin')) {
            return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus');
        }
        
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}