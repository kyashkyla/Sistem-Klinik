<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ubah enum untuk support admin juga
            $table->string('role')->change();
        });
    }

    public function down(): void
    {
        // Revert ke enum jika diperlukan
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['staff', 'dokter', 'pasien'])->change();
        });
    }
};
