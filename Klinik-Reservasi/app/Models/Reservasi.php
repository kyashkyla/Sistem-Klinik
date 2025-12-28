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
        'ID_Dokter',
        'Tanggal_Reservasi',
        'Tanggal_Kunjungan',
        'Jam_Kunjungan',
        'Keluhan',
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

    public function dokter()
    {
        return $this->belongsTo(User::class, 'ID_Dokter');
    }

    public function hasilKunjungan()
    {
        return $this->hasMany(HasilKunjungan::class, 'ID_Reservasi', 'ID_Reservasi');
    }
}