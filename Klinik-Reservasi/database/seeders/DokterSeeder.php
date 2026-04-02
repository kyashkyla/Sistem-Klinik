<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokter')->insert([
            [
                'Nama' => 'Dr. Andi Setiawan',
                'No_Telepon' => '081222222222',
                'Email' => 'dr.andi@klinik.com',
                'Password' => Hash::make('password123'),
                'Spesialis' => 'Umum',
                'Biodata_Diri' => 'Dokter Umum berpengalaman 10 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nama' => 'Dr. Sinta Wijaya',
                'No_Telepon' => '081333333333',
                'Email' => 'dr.sinta@klinik.com',
                'Password' => Hash::make('password123'),
                'Spesialis' => 'Gigi',
                'Biodata_Diri' => 'Dokter Gigi profesional dengan sertifikasi internasional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nama' => 'Dr. Budi Hartono',
                'No_Telepon' => '081444444444',
                'Email' => 'dr.budi@klinik.com',
                'Password' => Hash::make('password123'),
                'Spesialis' => 'Anak',
                'Biodata_Diri' => 'Spesialis anak dengan pengalaman 8 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
