<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

        $candidates = Candidat::all();

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
            'nomor_urut' => 'required',
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

    public function delete_candidate(Candidat $candidat)
    {
        $candidat->delete();
        return Redirect::back();
    }

    public function attendance()
    {
        $title = 'Attendance';
        return view('admin.attendance', compact('title'));
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
