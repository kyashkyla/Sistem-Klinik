<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('ID_Jadwal');
            $table->date('Tanggal');
            $table->time('Waktu');
            $table->string('Status_Slot');
            $table->unsignedBigInteger('ID_Dokter');
            $table->timestamps();

            $table->foreign('ID_Dokter')->references('ID_Dokter')->on('dokter')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};