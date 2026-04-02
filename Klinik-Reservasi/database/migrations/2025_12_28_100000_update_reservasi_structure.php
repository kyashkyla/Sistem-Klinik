<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan kolom user_id ke tabel jadwal untuk referensi user (dokter)
        Schema::table('jadwal', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                  ->nullable()
                  ->after('ID_Dokter');
            
            $table->string('Keluhan')->nullable()->after('Status_Slot');
            $table->string('Jam_Kunjungan')->nullable()->after('Waktu');
        });

        // Update reservasi untuk support kedua sistem
        Schema::table('reservasi', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Dokter')->nullable()->after('ID_Jadwal');
            $table->date('Tanggal_Kunjungan')->nullable()->after('Tanggal_Reservasi');
            $table->string('Jam_Kunjungan')->nullable()->after('Tanggal_Kunjungan');
            $table->string('Keluhan')->nullable()->after('Jam_Kunjungan');
        });
    }

    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'Keluhan', 'Jam_Kunjungan']);
        });

        Schema::table('reservasi', function (Blueprint $table) {
            $table->dropColumn(['ID_Dokter', 'Tanggal_Kunjungan', 'Jam_Kunjungan', 'Keluhan']);
        });
    }
};
