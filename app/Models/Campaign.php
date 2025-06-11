<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaign';
    protected $fillable = ['title', 'description', 'location', 'date', 'time'];
}
