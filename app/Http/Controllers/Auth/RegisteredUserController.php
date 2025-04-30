<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AnggotaAktif;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'kode_cx' => ['required', 'string', 'max:7'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $randomPassword = Str::lower(Str::random(5));

        $now = Carbon::now();
        $jam = $now->hour;
        $today = $now->toDateString();
        $kodeCx = $request->kode_cx;
        $name = $request->name;

        $user = User::where('kode_cx', $kodeCx)->first();

        if ($user && $user->name !== $name) {
            toast('Kode CX tersebut sudah digunakan oleh orang lain.', 'error');
            return redirect()->route('register');
        }

        if (!$user) {
            // Belum ada, buat baru dan langsung isi absen
            $user = User::create([
                'kode_cx' => $kodeCx,
                'name' => $request->name,
                'password' => $randomPassword,
            ]);
        }

        $absen = AnggotaAktif::where('user_id', $user->id)
            ->where('tanggal', $today)
            ->first();

        if ($jam >= 8 && $jam < 12) {
            // Belum ada, buat baru dan langsung isi absen
            if (!$absen) {
                $absen = AnggotaAktif::create([
                    'user_id' => $user->id,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);

                toast('Absen Pagi berhasil', 'success');
                return redirect()->route('absensi');
            } else {
                toast('Lu Sudah Absen Pagi Bro', 'warning');
                return redirect()->route('absensi');
            }
        } elseif ($jam >= 12 && $jam < 17) {
            if (!$absen) {
                $absen = AnggotaAktif::create([
                    'user_id' => $user->id,
                    'tanggal' => $today,
                    'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                    'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
                ]);

                toast('Absen Siang berhasil', 'success');
                return redirect()->route('absensi');
            } elseif ($absen && $absen->absen_siang == null) {
                $absen->update(['absen_siang' => $now->toTimeString()]);

                toast('Absen Siang berhasil', 'success');
                return redirect()->route('absensi');
            } else {
                toast('Lu Sudah Absen Siang Bro', 'warning');
                return redirect()->route('absensi');
            }
        }

        event(new Registered($user));

        toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');

        return redirect()->route('absensi');
    }
}
