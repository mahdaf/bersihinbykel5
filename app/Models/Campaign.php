<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaign';

    public function coverImage()
    {
        return $this->hasOne(GambarCampaign::class, 'campaign_id')->where('isCover', true);
    }
    public function partisipanCampaigns()
    {
        return $this->hasMany(\App\Models\PartisipanCampaign::class, 'campaign_id');
    }
    
    use HasFactory;
    
    protected $fillable = [
        'akun_id', 'nama', 'waktu', 'waktu_diperbarui', 'deskripsi', 'lokasi', 'kontak', 'kuota_partisipan'
    ];

    public function akun() {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
