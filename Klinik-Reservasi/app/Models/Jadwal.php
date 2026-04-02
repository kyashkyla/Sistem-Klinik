<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'ID_Jadwal';

    protected $fillable = [
        'Hari',
        'Jam_Mulai',
        'Jam_Selesai',
        'Status_Slot',
        'ID_Dokter'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'ID_Dokter');
    }
}