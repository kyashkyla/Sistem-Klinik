<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffKlinik extends Model
{
    protected $table = 'staff_klinik';
    protected $primaryKey = 'ID_Staff';

    protected $fillable = [
        'Nama',
        'No_Telepon',
        'Email',
        'Password',
        'Biodata_Diri'
    ];

    protected $hidden = ['Password'];
}