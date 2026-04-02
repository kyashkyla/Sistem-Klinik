<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id('ID_Reservasi');
            $table->unsignedBigInteger('ID_Pasien');
            $table->unsignedBigInteger('ID_Jadwal');
            $table->date('Tanggal_Reservasi');
            $table->string('Status');
            $table->text('Keterangan')->nullable();
            $table->timestamps();

            $table->foreign('ID_Pasien')->references('ID_Pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('ID_Jadwal')->references('ID_Jadwal')->on('jadwal')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};