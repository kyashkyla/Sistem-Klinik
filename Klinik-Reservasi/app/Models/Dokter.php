<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'ID_Dokter';

    protected $fillable = [
        'Nama',
        'No_Telepon',
        'Email',
        'Password',
        'Spesialis',
        'Biodata_Diri'
    ];

    protected $hidden = ['Password'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'ID_Dokter');
    }
}