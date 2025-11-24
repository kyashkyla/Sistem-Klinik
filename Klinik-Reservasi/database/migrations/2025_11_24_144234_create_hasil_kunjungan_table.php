<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_kunjungan', function (Blueprint $table) {
            $table->id('ID_Hasil');
            $table->unsignedBigInteger('ID_Reservasi');
            $table->date('Tanggal_Kunjungan');
            $table->text('Catatan_Dokter')->nullable();
            $table->timestamps();

            $table->foreign('ID_Reservasi')->references('ID_Reservasi')->on('reservasi')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_kunjungan');
    }
};