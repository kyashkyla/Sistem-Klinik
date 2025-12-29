<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Dokter;

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
        // 👨‍⚕️ AMBIL SEMUA DOKTER DARI DATABASE (hanya yang punya jadwal tersedia)
        $dokter = Dokter::whereHas('jadwal', function($query) {
            $query->where('Status_Slot', 'Tersedia');
        })->get();
        
        return view('pasien.jadwal', ['dokter' => $dokter]);
    }

    // ✅ PROSES SUBMIT FORM DAFTAR
    public function store(Request $request)
    {
        $request->validate([
            'keluhan'           => 'required|string|max:255',
            'id_dokter'        => 'required|exists:dokter,ID_Dokter',
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

    // ✅ API UNTUK AMBIL JAM JADWAL DOKTER BERDASARKAN HARI DAN TANGGAL
    public function getJadwalDokter($id_dokter, $tanggal)
    {
        try {
            \Log::info('getJadwalDokter called', ['id_dokter' => $id_dokter, 'tanggal' => $tanggal]);
            
            // Parse tanggal untuk mendapatkan hari dalam minggu
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggal);
            
            // Carbon dayOfWeek: Monday=1, Sunday=0
            // Kami ingin: Monday=1, Sunday=7
            $dayOfWeek = $date->dayOfWeek;
            if ($dayOfWeek == 0) {
                $dayOfWeek = 7;
            }
            
            \Log::info('Converted date', ['original_date' => $tanggal, 'dayOfWeek' => $dayOfWeek, 'day_name' => $date->format('l')]);
            
            // Cari jadwal dokter untuk hari tersebut
            $jadwal = \App\Models\Jadwal::where('ID_Dokter', $id_dokter)
                ->where('Hari', $dayOfWeek)
                ->where('Status_Slot', 'Tersedia')
                ->first();
            
            \Log::info('Jadwal search result', ['found' => $jadwal ? 'yes' : 'no']);
            
            if (!$jadwal) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dokter tidak ada jadwal pada hari tersebut',
                    'data' => []
                ]);
            }
            
            // Generate waktu slot dengan interval 30 menit
            $jamMulai = \Carbon\Carbon::createFromTimeString($jadwal->Jam_Mulai);
            $jamSelesai = \Carbon\Carbon::createFromTimeString($jadwal->Jam_Selesai);
            
            $timeSlots = [];
            while ($jamMulai < $jamSelesai) {
                $timeSlots[] = $jamMulai->format('H:i');
                $jamMulai->addMinutes(30);
            }
            
            \Log::info('Time slots generated', ['count' => count($timeSlots), 'slots' => $timeSlots]);
            
            return response()->json([
                'success' => true,
                'data' => $timeSlots
            ]);
        } catch (\Exception $e) {
            \Log::error('getJadwalDokter error', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
