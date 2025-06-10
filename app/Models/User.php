<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'akun';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'email',
        'password',
        'namaPengguna',
        'fotoProfil',
        'nomorTelepon',
        'jenis_akun_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get the user's type of account
     */
    public function jenisAkun()
    {
        return $this->belongsTo(JenisAkun::class, 'jenis_akun_id');
    }

    /**
     * Get user's campaign participations
     */
    public function partisipanCampaigns()
    {
        return $this->hasMany(PartisipanCampaign::class, 'akun_id');
    }

    /**
     * Get user's community profile if exists
     */
    public function akunKomunitas()
    {
        return $this->hasOne(AkunKomunitas::class, 'akun_id');
    }
}
