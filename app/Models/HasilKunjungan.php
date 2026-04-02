<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilKunjungan extends Model
{
    protected $table = 'hasil_kunjungan';
    protected $primaryKey = 'ID_Hasil';

    protected $fillable = [
        'ID_Reservasi',
        'Tanggal_Kunjungan',
        'Catatan_Dokter'
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'ID_Reservasi');
    }
}