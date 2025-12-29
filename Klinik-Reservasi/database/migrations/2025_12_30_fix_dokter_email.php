<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update dokter emails to match users table
        DB::table('dokter')->where('Email', 'andi@klinik.com')->update(['Email' => 'dr.andi@klinik.com']);
        DB::table('dokter')->where('Email', 'sinta@klinik.com')->update(['Email' => 'dr.sinta@klinik.com']);
        DB::table('dokter')->where('Email', 'budi@klinik.com')->update(['Email' => 'dr.budi@klinik.com']);
        DB::table('dokter')->where('Email', 'ratna@klinik.com')->update(['Email' => 'dr.ratna@klinik.com']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original emails
        DB::table('dokter')->where('Email', 'dr.andi@klinik.com')->update(['Email' => 'andi@klinik.com']);
        DB::table('dokter')->where('Email', 'dr.sinta@klinik.com')->update(['Email' => 'sinta@klinik.com']);
        DB::table('dokter')->where('Email', 'dr.budi@klinik.com')->update(['Email' => 'budi@klinik.com']);
        DB::table('dokter')->where('Email', 'dr.ratna@klinik.com')->update(['Email' => 'ratna@klinik.com']);
    }
};
