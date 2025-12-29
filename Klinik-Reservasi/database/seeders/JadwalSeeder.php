<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks for truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Clear existing jadwal data
        DB::table('jadwal')->truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Dr. Andi Wijaya (ID=1) - Umum - Monday to Friday, 08:00-16:00
        for ($hari = 1; $hari <= 5; $hari++) {
            DB::table('jadwal')->insert([
                'ID_Dokter' => 1,
                'Hari' => $hari,
                'Jam_Mulai' => '08:00',
                'Jam_Selesai' => '16:00',
                'Status_Slot' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Dr. Sinta Kusuma (ID=2) - Gigi - Monday to Thursday, 13:00-17:00
        for ($hari = 1; $hari <= 4; $hari++) {
            DB::table('jadwal')->insert([
                'ID_Dokter' => 2,
                'Hari' => $hari,
                'Jam_Mulai' => '13:00',
                'Jam_Selesai' => '17:00',
                'Status_Slot' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Dr. Budi Hartono (ID=3) - Anak - Saturday only, 08:00-11:00
        DB::table('jadwal')->insert([
            'ID_Dokter' => 3,
            'Hari' => 6, // Saturday
            'Jam_Mulai' => '08:00',
            'Jam_Selesai' => '11:00',
            'Status_Slot' => 'Tersedia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
