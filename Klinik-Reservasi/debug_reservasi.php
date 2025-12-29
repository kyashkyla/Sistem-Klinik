<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use App\Models\Dokter;
use App\Models\Reservasi;

echo "=== USER (DOKTER) ===\n";
$users = User::where('role', 'dokter')->get();
foreach ($users as $u) {
    echo "ID: {$u->id}, Email: {$u->email}, Name: {$u->name}\n";
}

echo "\n=== DOKTER TABLE ===\n";
$dokters = Dokter::all();
foreach ($dokters as $d) {
    echo "ID: {$d->ID_Dokter}, Email: {$d->Email}, Nama: {$d->Nama}\n";
}

echo "\n=== RESERVASI ===\n";
$reservasi = Reservasi::with(['dokter', 'pasien'])->get();
foreach ($reservasi as $r) {
    $nama_pasien = isset($r->pasien->Nama) ? $r->pasien->Nama : '-';
    echo "ID: {$r->ID_Reservasi}, Pasien: {$nama_pasien}, Dokter ID: {$r->ID_Dokter}, Status: {$r->Status}\n";
}
