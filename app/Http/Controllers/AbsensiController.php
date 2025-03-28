<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('absensi.absensi');
    }

    public function anggota_muda()
    {
        return view('absensi.anggota_muda');
    }

    public function anggota_luar_biasa()
    {
        return view('absensi.anggota_luar_biasa');
    }

    public function lainnya()
    {
        return view('absensi.lainnya');
    }
}
