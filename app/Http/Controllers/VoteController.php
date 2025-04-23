<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Pencoblosan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use RealRashid\SweetAlert\Facades\Alert;


class VoteController extends Controller
{
    public function index()
    {
        $candidates = Candidat::orderBy('nomor_urut', 'asc')->get();
        return view('vote', compact('candidates'));
    }

    public function vote(Request $request)
    {
        $user = Auth::user();

        // Cek jika user sudah melakukan voting (pencoblosan)
        $alreadyVoted = Pencoblosan::where('user_id', $user->id)->exists();

        if ($alreadyVoted) {
            // Jika sudah voting, tampilkan pesan
            Auth::logout();
            Alert::error('Error Title', 'Anda Sudah Melakukan Voting');
            return Redirect::route('absensi');
        }

        // Cek apakah user memiliki role yang diperbolehkan untuk voting
        if ($user->role == true) {
            Alert::error('Error Title', 'Admin dilarang voting');
            return Redirect::route('dashboard');
        }

        // Validasi kandidat yang dipilih
        $request->validate([
            'candidate_id' => 'required|exists:candidats,id',
        ]);

        // Simpan data pencoblosan
        Pencoblosan::create([
            'user_id' => $user->id,
            'candidat_id' => $request->candidate_id,
        ]);

        Auth::logout();

        // Redirect dengan pesan sukses
        Alert::success('Berhasil mencoblos', 'Data pencoblosan telah tersimpan');
        return Redirect::route('absensi')->with('logout', true);
    }
}
