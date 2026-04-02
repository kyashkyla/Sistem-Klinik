<?php
require_once 'vendor/autoload.php';

use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\Dokter;

// Test date parsing
$date = Carbon::createFromFormat('Y-m-d', '2025-12-31');
$dayOfWeek = $date->dayOfWeek;
if ($dayOfWeek == 0) $dayOfWeek = 7;

echo "Date: 2025-12-31\n";
echo "Day of Week (Carbon): " . $date->dayOfWeek . "\n";
echo "Day of Week (Converted): " . $dayOfWeek . "\n";
echo "Expected: 3 (Wednesday)\n\n";

// Test database query
$id_dokter = 1; // Dr. Andi
$hari = 3; // Wednesday

echo "Searching for Jadwal:\n";
echo "ID_Dokter: $id_dokter\n";
echo "Hari: $hari\n";
echo "Status_Slot: Tersedia\n\n";

$jadwal = Jadwal::where('ID_Dokter', $id_dokter)
    ->where('Hari', $hari)
    ->where('Status_Slot', 'Tersedia')
    ->first();

if ($jadwal) {
    echo "✓ Found!\n";
    echo "Jam_Mulai: " . $jadwal->Jam_Mulai . "\n";
    echo "Jam_Selesai: " . $jadwal->Jam_Selesai . "\n";
} else {
    echo "✗ Not found!\n";
    
    // Debug: show all jadwal for Dr. Andi
    echo "\nAll jadwal for Dr. Andi:\n";
    $allJadwal = Jadwal::where('ID_Dokter', $id_dokter)->get();
    foreach ($allJadwal as $j) {
        echo "- Hari: {$j->Hari}, Jam: {$j->Jam_Mulai} - {$j->Jam_Selesai}, Status: {$j->Status_Slot}\n";
    }
}
