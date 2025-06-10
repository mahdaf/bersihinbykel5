<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarCampaign extends Model
{
    protected $table = 'gambar_campaign';
    public $timestamps = false;

    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class, 'campaign_id');
    }
}
