<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Test queries
echo "=== DOKTER DATA ===\n";
$dokter = DB::table('dokter')->get();
var_dump($dokter);

echo "\n=== USERS DATA ===\n";
$users = DB::table('users')->where('role', 'dokter')->get();
var_dump($users);

echo "\n=== RESERVASI DATA ===\n";
$reservasi = DB::table('reservasi')->get();
var_dump($reservasi);

echo "\n=== CHECKING DOKTER WITH EMAIL ===\n";
$email = 'dr.andi@klinik.com';
$found = DB::table('dokter')->where('Email', $email)->first();
echo "Email: $email\n";
var_dump($found);
?>
