<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasiTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil pasien dan dokter yang sudah ada
        $pasien = DB::table('pasien')->first();
        $dokter = DB::table('dokter')->first();

        if (!$pasien || !$dokter) {
            echo "Pasien atau Dokter tidak ditemukan\n";
            return;
        }

        // Buat beberapa reservasi dengan status "Disetujui"
        for ($i = 0; $i < 3; $i++) {
            DB::table('reservasi')->insert([
                'ID_Pasien' => $pasien->ID_Pasien,
                'ID_Dokter' => $dokter->ID_Dokter,
                'ID_Jadwal' => null,
                'Tanggal_Reservasi' => now()->toDateString(),
                'Tanggal_Kunjungan' => now()->addDays($i + 1)->toDateString(),
                'Jam_Kunjungan' => '10:00',
                'Keluhan' => 'Sakit kepala #' . ($i + 1),
                'Status' => 'Disetujui',
                'Keterangan' => 'Reservasi test #' . ($i + 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
