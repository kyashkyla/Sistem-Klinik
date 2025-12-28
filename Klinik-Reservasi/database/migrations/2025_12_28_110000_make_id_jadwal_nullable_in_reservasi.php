<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Buat ID_Jadwal nullable karena reservasi pasien tidak memerlukan jadwal yang sudah terbuat
        Schema::table('reservasi', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Jadwal')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('reservasi', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Jadwal')->nullable(false)->change();
        });
    }
};
