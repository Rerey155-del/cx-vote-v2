<?php

namespace App\Http\Controllers;

use App\Models\AnggotaLuarBiasa;
use App\Models\AnggotaMuda;
use App\Models\LembagaLainnya;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    public function index()
    {
        $title  = "Status";
        return view('absensi.absensi', compact('title'));
    }

    public function anggota_muda()
    {
        $title  = "Anggota Muda";
        return view('absensi.anggota_muda', compact('title'));
    }

    public function store_anggota_muda(Request $request)
    {
        $request->validate([
            'no_bp' => 'required',
            'name' => 'required'
        ]);

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();

        // Cari record hari ini berdasarkan no_bp ATAU nama (case-insensitive)
        $anggota = AnggotaMuda::where('tanggal', $today)
            ->where(function ($query) use ($request) {
                $query->where('no_bp', $request->no_bp)
                      ->orWhere('name', $request->name);
            })
            ->first();

        if ($jam >= 8 && $jam < 12) {
            if (!$anggota) {
                AnggotaMuda::create([
                    'no_bp' => $request->no_bp,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => $now->toTimeString(),
                ]);
                toast('Absen Pagi berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return Redirect::route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$anggota) {
                // Belum absen pagi hari ini, buat record baru dengan siang
                AnggotaMuda::create([
                    'no_bp' => $request->no_bp,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_siang' => $now->toTimeString(),
                ]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } elseif ($anggota->absen_siang == null) {
                // Sudah absen pagi, update record yang sama dengan siang
                $anggota->update(['absen_siang' => $now->toTimeString()]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Siang Bro', 'warning');
                return Redirect::route('absensi');
            }
        }

        toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
        return Redirect::route('absensi');
    }

    public function anggota_luar_biasa()
    {
        $title = "Anggota Luar Biasa";
        return view('absensi.anggota_luar_biasa', compact('title'));
    }

    public function store_anggota_luar_biasa(Request $request)
    {
        $request->validate([
            'angkatan' => 'required',
            'name' => 'required'
        ]);

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();

        // Cari record hari ini berdasarkan nama
        $alb = AnggotaLuarBiasa::where('tanggal', $today)
            ->where('name', $request->name)
            ->first();

        if ($jam >= 8 && $jam < 12) {
            if (!$alb) {
                AnggotaLuarBiasa::create([
                    'angkatan' => $request->angkatan,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => $now->toTimeString(),
                ]);
                toast('Absen Pagi berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return Redirect::route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$alb) {
                AnggotaLuarBiasa::create([
                    'angkatan' => $request->angkatan,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_siang' => $now->toTimeString(),
                ]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } elseif ($alb->absen_siang == null) {
                $alb->update(['absen_siang' => $now->toTimeString()]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Siang Bro', 'warning');
                return Redirect::route('absensi');
            }
        }

        toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
        return Redirect::route('absensi');
    }

    public function lembaga_lainnya()
    {
        $title = "Lembaga Lainnya";
        return view('absensi.lembaga_lainnya', compact('title'));
    }

    public function store_lembaga_lainnya(Request $request)
    {
        $request->validate([
            'lembaga' => 'required',
            'name' => 'required'
        ]);

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();

        // Cari record hari ini berdasarkan nama
        $lembaga = LembagaLainnya::where('tanggal', $today)
            ->where('name', $request->name)
            ->first();

        if ($jam >= 8 && $jam < 12) {
            if (!$lembaga) {
                LembagaLainnya::create([
                    'lembaga' => $request->lembaga,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => $now->toTimeString(),
                ]);
                toast('Absen Pagi berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return Redirect::route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$lembaga) {
                LembagaLainnya::create([
                    'lembaga' => $request->lembaga,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_siang' => $now->toTimeString(),
                ]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } elseif ($lembaga->absen_siang == null) {
                $lembaga->update(['absen_siang' => $now->toTimeString()]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Siang Bro', 'warning');
                return Redirect::route('absensi');
            }
        }

        toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
        return Redirect::route('absensi');
    }
}
