<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('pendaftaran_online', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
            $table->string('nama_pasien')->after('user_id');
            $table->text('keluhan')->after('nama_pasien');
            $table->string('dokter')->after('keluhan');
            $table->date('tanggal_kunjungan')->after('dokter');
            $table->time('jam_kunjungan')->after('tanggal_kunjungan');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_online', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'user_id',
                'nama_pasien',
                'keluhan',
                'dokter',
                'tanggal_kunjungan',
                'jam_kunjungan',
            ]);
        });
    }
};
