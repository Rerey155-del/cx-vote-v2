<?php

namespace App\Http\Controllers;

use App\Models\AnggotaAktif;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        return view('admin.dashboard', compact('title'));
    }

    public function candidate()
    {
        $title = 'Candidate';

        $candidates = Candidat::orderBy('nomor_urut', 'asc')->get();

        return view('admin.candidate.candidate', compact('title', 'candidates'));
    }

    public function candidate_add()
    {
        $title = 'Candidate';
        return view('admin.candidate.add', compact('title'));
    }

    public function candidate_store(Request $request)
    {
        $request->validate([
            'ketua_name' => 'required',
            'wakil_name' => 'required',
            'nomor_urut' => 'required|unique:candidats,nomor_urut',
            'visi' => 'required',
            'misi' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->put('/' . $path, file_get_contents($file));

        Candidat::create([
            'ketua_name' => $request->ketua_name,
            'wakil_name' => $request->wakil_name,
            'nomor_urut' => $request->nomor_urut,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' => $path
        ]);
        return Redirect::route('dashboard-candidate');
    }

    public function edit_candidate($id)
    {
        $title = 'Update Candidate';
        $candidate = Candidat::findOrFail($id);

        return view('admin.candidate.update', compact('title', 'candidate'));
    }

    public function update_candidate(Request $request, Candidat $candidat)
    {
        $request->validate([
            'ketua_name' => 'required|string|max:255',
            'wakil_name' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'nomor_urut' => 'required|unique:candidats,nomor_urut,' . $candidat->id,
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($candidat->image) {
                Storage::disk('public')->delete($candidat->image);
            }

            // Simpan gambar baru
            $path = $request->file('image')->store('canditates', 'public');
            $candidat->image = $path;
        }

        $candidat->update([
            'ketua_name' => $request->ketua_name,
            'wakil_name' => $request->wakil_name,
            'nomor_urut' => $request->nomor_urut,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'image' => $candidat->image ?? $candidat->getOriginal('image'),
        ]);

        return Redirect::route('dashboard-candidate');
    }

    public function delete_candidate(Candidat $candidat)
    {
        $candidat->delete();

        Alert::success('Berhasil', 'Kandidat telah dihapus');
        return Redirect::route('dashboard-candidate');
    }

    public function attendance()
    {
        $title = 'Attendance';

        $anggota_aktifs = AnggotaAktif::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.attendance', compact('title', 'anggota_aktifs'));
    }

    public function voters()
    {
        $title = 'Voters';
        return view('admin.voters', compact('title'));
    }

    public function report()
    {
        $title = 'Report';
        return view('admin.report', compact('title'));
    }
}
