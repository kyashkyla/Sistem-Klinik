<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            $table->string('Nama')->nullable()->change();
            $table->string('Alamat')->nullable()->change();
            $table->string('No_Telepon')->nullable()->change();
            $table->string('Password')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            $table->string('Nama')->nullable(false)->change();
            $table->string('Alamat')->nullable(false)->change();
            $table->string('No_Telepon')->nullable(false)->change();
            $table->string('Password')->nullable(false)->change();
        });
    }
};
