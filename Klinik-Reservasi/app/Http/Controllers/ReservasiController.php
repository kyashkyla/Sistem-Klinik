<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $primaryKey = 'ID_Reservasi';

    protected $fillable = [
        'ID_Pasien',
        'ID_Jadwal',
        'Tanggal_Reservasi',
        'Status',
        'Keterangan',
    ];

    // Relasi ke Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'ID_Pasien');
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'ID_Jadwal');
    }
}