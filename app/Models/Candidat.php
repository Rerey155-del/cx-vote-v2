<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidat extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ketua_name',
        'wakil_name',
        'nomor_urut',
        'visi',
        'misi',
        'image'
    ];
}
