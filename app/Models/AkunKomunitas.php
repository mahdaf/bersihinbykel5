<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkunKomunitas extends Model
{
    protected $table = 'akun_komunitas';
    public $timestamps = false;
    protected $fillable = ['akun_id', 'portofolio'];
}