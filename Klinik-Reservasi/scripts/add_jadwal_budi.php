<?php

// Bootstrap Laravel so we can use DB/Eloquent
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

try {
    $now = Carbon::now();
    $rows = [];
    for ($d = 1; $d <= 5; $d++) {
        $rows[] = [
            'Jam_Kunjungan' => '',
            'Status_Slot' => 'Tersedia',
            'ID_Dokter' => 3,
            'Hari' => $d,
            'Jam_Mulai' => '08:00:00',
            'Jam_Selesai' => '11:00:00',
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }

    DB::table('jadwal')->insert($rows);
    echo "Inserted jadwal for Dokter ID 3 (Mon-Fri 08:00-11:00)\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
