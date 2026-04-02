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
        'Biodata_Diri',
        'user_id'
    ];

    protected $hidden = ['Password'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'ID_Pasien');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}