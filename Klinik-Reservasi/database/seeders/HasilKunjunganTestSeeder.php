<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilKunjunganTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa reservasi yang sudah ada
        $reservasi = DB::table('reservasi')->limit(3)->get();

        foreach ($reservasi as $res) {
            DB::table('hasil_kunjungan')->insert([
                'ID_Reservasi' => $res->ID_Reservasi,
                'Tanggal_Kunjungan' => $res->Tanggal_Kunjungan,
                'Catatan_Dokter' => 'Pasien ' . $res->Keluhan . '. Diberikan resep dan saran istirahat.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
