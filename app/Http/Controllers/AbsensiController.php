<?php

namespace App\Http\Controllers;

use App\Models\AnggotaLuarBiasa;
use App\Models\AnggotaMuda;
use App\Models\LembagaLainnya;
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

    public function store_anggota_luar_biasa(Request $request)
    {
        $request->validate([
            'angkatan',
            'name'
        ]);

        AnggotaLuarBiasa::create([
            'angkatan' => $request->angkatan,
            'name' => $request->name,
        ]);

        return Redirect::route('absensi');
    }

    public function lembaga_lainnya()
    {
        return view('absensi.lembaga_lainnya');
    }

    public function store_lembaga_lainnya(Request $request)
    {
        $request->validate([
            'lembaga',
            'name'
        ]);

        LembagaLainnya::create([
            'lembaga' => $request->lembaga,
            'name' => $request->name,
        ]);

        return Redirect::route('absensi');
    }
}
