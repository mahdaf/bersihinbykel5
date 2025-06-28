<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $fillable = [
        'akun_id',
        'campaign_id',
        'komentar',
    ];

    public function akun()
    {
        return $this->belongsTo(\App\Models\User::class, 'akun_id');
    }

    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akun');
            $table->foreignId('campaign_id')->constrained('campaign');
            $table->string('komentar', 280);
            $table->timestamps();
        });
    }

    public function likes()
    {
        return $this->belongsToMany(\App\Models\User::class, 'komentar_disukai', 'komentar_id', 'akun_id');
    }
}
