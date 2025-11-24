<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'ID_Pasien';

    protected $fillable = [
        'Nama',
        'Alamat',
        'No_Telepon',
        'Email',
        'Password',
        'Biodata_Diri'
    ];

    protected $hidden = ['Password'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'ID_Pasien');
    }
}