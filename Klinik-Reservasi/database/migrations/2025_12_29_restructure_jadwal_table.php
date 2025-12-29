<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            // Tambah kolom baru dulu
            // Hari: 1=Senin, 2=Selasa, 3=Rabu, 4=Kamis, 5=Jumat, 6=Sabtu, 7=Minggu
            $table->tinyInteger('Hari')->nullable()->after('ID_Dokter')->comment('1=Senin, 2=Selasa, ..., 7=Minggu');
            $table->time('Jam_Mulai')->nullable()->after('Hari');
            $table->time('Jam_Selesai')->nullable()->after('Jam_Mulai');
        });

        Schema::table('jadwal', function (Blueprint $table) {
            // Hapus kolom lama yang tidak lagi diperlukan
            $table->dropColumn(['Tanggal', 'Waktu']);
        });

        Schema::table('jadwal', function (Blueprint $table) {
            // Update default
            $table->string('Status_Slot')->default('Tersedia')->change();
        });
    }

    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            // Restore kolom lama (nullable untuk menghindari error '0000-00-00')
            $table->date('Tanggal')->nullable();
            $table->time('Waktu')->nullable();
            $table->dropColumn(['Hari', 'Jam_Mulai', 'Jam_Selesai']);
        });
    }
};
