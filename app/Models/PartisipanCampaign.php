<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartisipanCampaign extends Model
{
    protected $table = 'partisipan_campaign';

    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class, 'campaign_id');
    }
}
