<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('ID_Dokter');
            $table->string('Nama');
            $table->string('No_Telepon');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Spesialis');
            $table->text('Biodata_Diri')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};