<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    protected $primaryKey = 'ID_Reservasi';

    protected $fillable = [
        'ID_Pasien',
        'ID_Jadwal',
        'Tanggal_Reservasi',
        'Status',
        'Keterangan'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'ID_Pasien');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'ID_Jadwal');
    }
}