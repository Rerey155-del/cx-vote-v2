<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_cx' => ['required', 'string', 'max:7'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $randomPassword = Str::lower(Str::random(5));

        $user = User::create([
            'kode_cx' => $request->kode_cx,
            'name' => $request->name,
            'password' => $randomPassword,
        ]);

        event(new Registered($user));

        return redirect()->route('absensi')->with('status', 'Data absensi berhasil diinputkan');
    }
}
