<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaMuda extends Model
{
    protected $fillable = [
        'name',
        'no_bp',
        'tanggal',
        'absen_pagi',
        'absen_siang',
    ];
}
