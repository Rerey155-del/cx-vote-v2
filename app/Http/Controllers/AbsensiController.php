<?php

namespace App\Http\Controllers;

use App\Models\AnggotaMuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function store_anggota_muda(Request $request)
    {
        $request->validate([
            'name'
        ]);

        AnggotaMuda::create([
            'name' => $request->name,
        ]);

        return Redirect::route('absensi');
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
