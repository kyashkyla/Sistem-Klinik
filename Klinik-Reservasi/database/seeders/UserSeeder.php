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
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        DB::table('pasien')->truncate();
        DB::table('users')->truncate();
        
        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // 👤 ADMIN
        DB::table('users')->insert([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'spesialis' => null,
            'no_hp' => '081111111111',
            'alamat' => 'Jl. Admin No. 1',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 👨‍⚕️ DOKTER (3 DOKTER)
        $dokter = [
            [
                'name' => 'Dr. Andi Setiawan',
                'email' => 'dr.andi@klinik.com',
                'password' => Hash::make('password123'),
                'role' => 'dokter',
                'spesialis' => 'Umum',
                'no_hp' => '081222222222',
                'alamat' => 'Jl. Dokter No. 2',
            ],
            [
                'name' => 'Dr. Sinta Wijaya',
                'email' => 'dr.sinta@klinik.com',
                'password' => Hash::make('password123'),
                'role' => 'dokter',
                'spesialis' => 'Gigi',
                'no_hp' => '081333333333',
                'alamat' => 'Jl. Dokter No. 3',
            ],
            [
                'name' => 'Dr. Budi Hartono',
                'email' => 'dr.budi@klinik.com',
                'password' => Hash::make('password123'),
                'role' => 'dokter',
                'spesialis' => 'Anak',
                'no_hp' => '081444444444',
                'alamat' => 'Jl. Dokter No. 4',
            ],
        ];

        foreach ($dokter as $doc) {
            DB::table('users')->insert([
                ...$doc,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 👩‍💼 STAFF (2 STAFF)
        $staff = [
            [
                'name' => 'Rini Arumsari',
                'email' => 'rini.staff@klinik.com',
                'password' => Hash::make('password123'),
                'role' => 'staff',
                'spesialis' => null,
                'no_hp' => '081555555555',
                'alamat' => 'Jl. Staff No. 5',
            ],
            [
                'name' => 'Dicky Hermawan',
                'email' => 'dicky.staff@klinik.com',
                'password' => Hash::make('password123'),
                'role' => 'staff',
                'spesialis' => null,
                'no_hp' => '081666666666',
                'alamat' => 'Jl. Staff No. 6',
            ],
        ];

        foreach ($staff as $stf) {
            DB::table('users')->insert([
                ...$stf,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 👥 PASIEN (3 PASIEN)
        $pasien = [
            [
                'name' => 'Pasien Test 1',
                'email' => 'pasien1@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pasien',
                'spesialis' => null,
                'no_hp' => '089777777777',
                'alamat' => 'Jl. Pasien No. 7',
            ],
            [
                'name' => 'Pasien Test 2',
                'email' => 'pasien2@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pasien',
                'spesialis' => null,
                'no_hp' => '089888888888',
                'alamat' => 'Jl. Pasien No. 8',
            ],
            [
                'name' => 'Pasien Test 3',
                'email' => 'pasien3@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pasien',
                'spesialis' => null,
                'no_hp' => '089999999999',
                'alamat' => 'Jl. Pasien No. 9',
            ],
        ];

        foreach ($pasien as $psn) {
            $user = DB::table('users')->insertGetId([
                ...$psn,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 📝 INSERT KE TABEL PASIEN
            DB::table('pasien')->insert([
                'Nama' => $psn['name'],
                'Email' => $psn['email'],
                'Password' => $psn['password'],
                'No_Telepon' => $psn['no_hp'],
                'Alamat' => $psn['alamat'],
                'Biodata_Diri' => '',
                'user_id' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
