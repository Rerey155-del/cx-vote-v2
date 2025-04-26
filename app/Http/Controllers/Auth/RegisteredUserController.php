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
                // 'tanggal' => $today,
                // 'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                // 'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
            ]);
            // toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
            // return redirect()->route('absensi');
        }

        $absen = AnggotaAktif::where('user_id', $user->id)
            ->where('tanggal', $today)
            ->first();

        if (!$absen) {
            // Belum ada record absensi hari ini
            $absen = AnggotaAktif::create([
                'user_id' => $user->id,
                'tanggal' => $today,
                'absen_pagi' => ($jam >= 8 && $jam < 12) ? $now->toTimeString() : null,
                'absen_siang' => ($jam >= 12 && $jam <= 17) ? $now->toTimeString() : null,
            ]);

            toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
            return redirect()->route('absensi');
        }

        if ($jam >= 8 && $jam < 12) {
            if ($absen->absen_pagi !== null) {
                toast('Lu sudah absen pagi bro!', 'warning');
                return redirect()->route('absensi');
            }
            $absen->update(['absen_pagi' => $now->toTimeString()]);
            toast('Absensi pagi berhasil oiiiii', 'success');
        } elseif ($jam >= 12 && $jam <= 17) {
            if ($absen->absen_siang !== null) {
                toast('Lu sudah absen siang bro!', 'warning');
                return redirect()->route('absensi');
            }
            $absen->update(['absen_siang' => $now->toTimeString()]);
            toast('Anjay lu sudah absen siang bro', 'success');
            return redirect()->route('absensi');
        } else {
            toast('Waktu absen hanya antara jam 08.00 - 17.00.', 'warning');
            return redirect()->route('absensi');
        }

        event(new Registered($user));

        toast('Anda sudah Mengambil sebelumnya', 'warning');

        return redirect()->route('absensi');
    }
}
