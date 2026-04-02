<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'spesialis',
        'no_hp',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * ================= RELASI =================
     */

    // User -> Pasien
    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'user_id');
    }

    // User -> Dokter (jika dokter disimpan di tabel terpisah)
    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'user_id');
    }
}
