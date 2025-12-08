<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Admin Klinik',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'spesialis' => null,
                'no_hp' => '081234567890',
                'alamat' => 'Alamat Admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dokter Umum',
                'email' => 'dokter@example.com',
                'password' => Hash::make('password'),
                'role' => 'dokter',
                'spesialis' => 'Umum',
                'no_hp' => '081298765432',
                'alamat' => 'Alamat Dokter',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pasien Test',
                'email' => 'pasien@example.com',
                'password' => Hash::make('password'),
                'role' => 'pasien',
                'spesialis' => null,
                'no_hp' => '089912345678',
                'alamat' => 'Alamat Pasien',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
