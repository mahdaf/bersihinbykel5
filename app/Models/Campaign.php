<?php

namespace App\Models;

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
    public function gambar_campaign()
    {
        return $this->hasMany(\App\Models\GambarCampaign::class, 'campaign_id');
    }
}
