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
        return view('absensi.absensi');
    }

    public function anggota_muda()
    {
        return view('absensi.anggota_muda');
    }

    public function store_anggota_muda(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();

        $anggota = AnggotaMuda::where('name', $request->name)
            ->where('tanggal', $today)
            ->first();

        if ($jam >= 8 && $jam < 12) {
            // Belum ada, buat baru dan langsung isi absen
            if (!$anggota) {
                $anggota = AnggotaMuda::create([
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);
                toast('Absen Pagi berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return Redirect::route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$anggota) {
                $anggota = AnggotaMuda::create([
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);
                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } elseif ($anggota && $anggota->absen_siang == null) {
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
        return view('absensi.anggota_luar_biasa');
    }

    public function store_anggota_luar_biasa(Request $request)
    {
        $request->validate([
            'angkatan',
            'name'
        ]);

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();

        $alb = AnggotaLuarBiasa::where('name', $request->name)
            ->where('tanggal', $today)
            ->first();

        if ($jam >= 8 && $jam < 12) {
            // Belum ada, buat baru dan langsung isi absen
            if (!$alb) {
                $alb = AnggotaLuarBiasa::create([
                    'angkatan' => $request->angkatan,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);
                toast('Absen Pagi berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return Redirect::route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$alb) {
                $alb = AnggotaLuarBiasa::create([
                    'angkatan' => $request->angkatan,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);

                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } elseif ($alb && $alb->absen_siang == null) {
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
        return view('absensi.lembaga_lainnya');
    }

    public function store_lembaga_lainnya(Request $request)
    {
        $request->validate([
            'lembaga',
            'name'
        ]);

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();

        $lembaga = LembagaLainnya::where('name', $request->name)
            ->where('tanggal', $today)
            ->first();

        if ($jam >= 8 && $jam < 12) {
            // Belum ada, buat baru dan langsung isi absen
            if (!$lembaga) {
                $lembaga = LembagaLainnya::create([
                    'lembaga' => $request->lembaga,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);

                toast('Absen Pagi berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return Redirect::route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$lembaga) {
                $lembaga = LembagaLainnya::create([
                    'lembaga' => $request->lembaga,
                    'name' => $request->name,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);

                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } elseif ($lembaga && $lembaga->absen_siang == null) {
                $lembaga->update(['absen_siang' => $now->toTimeString()]);

                toast('Absen Siang berhasil', 'success');
                return Redirect::route('absensi');
            } else {
                toast('Lu Sudah Absen Siang Bro', 'warning');
                return Redirect::route('absensi');
            }
        }

        toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');


        // if (!$lembaga) {
        //     // Belum ada, buat baru dan langsung isi absen
        //     $lembaga = LembagaLainnya::create([
        //         'lembaga' => $request->lembaga,
        //         'name' => $request->name,
        //         'tanggal' => $today,
        //         'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
        //         'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
        //     ]);
        //     toast('Absensi berhasil', 'success');
        //     return Redirect::route('absensi');
        // }

        // if ($lembaga->tanggal !== $today) {
        //     // Reset absen jika beda tanggal
        //     $lembaga->update([
        //         'tanggal' => $today,
        //         'absen_pagi' => null,
        //         'absen_siang' => null,
        //     ]);
        // }

        // if ($jam >= 8 && $jam < 12) {
        //     if ($lembaga->absen_pagi !== null) {
        //         toast('Lu sudah absen pagi bro!', 'warning');
        //         return Redirect::route('absensi');
        //     }
        //     $lembaga->update(['absen_pagi' => $now->toTimeString()]);
        //     toast('Absensi pagi berhasil', 'success');
        // } elseif ($jam >= 12 && $jam <= 17) {
        //     if ($lembaga->absen_siang !== null) {
        //         toast('Lu sudah absen siang bro!', 'warning');
        //         return Redirect::route('absensi');
        //     }
        //     $lembaga->update(['absen_siang' => $now->toTimeString()]);
        //     toast('Anjay lu sudah absen siang bro', 'success');
        //     return Redirect::route('absensi');
        // } else {
        //     toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
        //     return Redirect::route('absensi');
        // }

        return Redirect::route('absensi');
    }
}
