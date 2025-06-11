<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartisipanCampaign extends Model
{
    protected $table = 'partisipan_campaign';
    protected $fillable = ['campaign_id', 'akun_id', 'nama_lengkap', 'email', 'nomor_ponsel', 'ktp'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class); 
    }
}
