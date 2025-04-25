<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaAktif extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'absen_pagi',
        'absen_siang',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
