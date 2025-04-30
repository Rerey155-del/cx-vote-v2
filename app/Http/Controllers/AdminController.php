<?php

namespace App\Http\Controllers;

use App\Models\AnggotaAktif;
use App\Models\AnggotaLuarBiasa;
use App\Models\AnggotaMuda;
use App\Models\Candidat;
use App\Models\LembagaLainnya;
use App\Models\Pencoblosan;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $pencoblosans = Pencoblosan::all();

        $hak_suaras = User::where('role', false)->get();

        $anggota_mudas = AnggotaMuda::all()->count();
        $anggota_luar_biasas = AnggotaLuarBiasa::all()->count();
        $lembaga_lainnyas = LembagaLainnya::all()->count();

        $belum_cobloses = User::where('role', false)
            ->whereDoesntHave('pencoblosan')
            ->get();

        $models = [
            AnggotaAktif::class,
            AnggotaLuarBiasa::class,
            AnggotaMuda::class,
            LembagaLainnya::class,
        ];

        $total_attendances = collect($models)
            ->map(fn($model) => $model::count())
            ->sum();

        return view(
            'admin.dashboard',
            compact(
                'title',
                'belum_cobloses',
                'pencoblosans',
                'anggota_mudas',
                'anggota_luar_biasas',
                'lembaga_lainnyas',
                'total_attendances',
                'hak_suaras'
            )
        );
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
            'misi' => 'required|string',
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

    public function keanggotaan()
    {
        $title = "Keanggotaan";

        $hak_suaras = User::where('role', false)
            ->orderBy('kode_cx', 'asc')
            ->get();

        $anggota_mudas = AnggotaMuda::orderBy('name', 'asc')->get();


        return view('admin.keanggotaan', compact('title', 'hak_suaras', 'anggota_mudas'));
    }

    public function store_anggota_aktif(Request $request)
    {
        $request->validate([
            'kode_cx' => ['required', 'string', 'max:7'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $kodeCx = $request->kode_cx;
        $name = $request->name;

        $randomPassword = Str::lower(Str::random(5));

        $user = User::where('kode_cx', $kodeCx)->first();

        if ($user && strtoupper($user->name) !== strtoupper($name)) {
            toast('Kode CX tersebut sudah digunakan oleh orang lain.', 'error');
            return Redirect::back();
        }

        $user = User::create([
            'kode_cx' => $kodeCx,
            'name' => strtoupper($request->name),
            'password' => $randomPassword,
        ]);

        event(new Registered($user));

        toast('Anggota aktif berhasil ditambahkan.', 'success');
        return Redirect::back();
    }

    public function store_anggota_muda(Request $request)
    {
        $request->validate([
            'no_bp' => ['required', 'string', 'max:15'],
            'name' => ['required', 'string', 'max:50'],
        ]);

        $noBp = $request->no_bp;
        $name = $request->name;

        $muda = AnggotaMuda::where('no_bp', $noBp)->first();

        if ($muda && strtoupper($muda->name) !== strtoupper($name)) {
            toast('Nobp tersebut sudah digunakan oleh orang lain.', 'error');
            return Redirect::back();
        }

        $muda = AnggotaMuda::create([
            'no_bp' => $noBp,
            'name' => strtoupper($request->name)
        ]);

        toast('Anggota muda berhasil ditambahkan.', 'success');
        return Redirect::back();
    }

    public function attendance()
    {
        $title = 'Attendance';

        $anggota_aktifs = AnggotaAktif::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        $albs = AnggotaLuarBiasa::orderBy('tanggal', 'desc')->get();

        $anggota_mudas = AnggotaMuda::orderBy('tanggal', 'desc')->get();

        $lembaga_lainnyas = LembagaLainnya::orderBy('tanggal', 'desc')->get();

        return view('admin.attendance', compact('title', 'anggota_aktifs', 'albs', 'anggota_mudas', 'lembaga_lainnyas'));
    }

    public function voters()
    {
        $title = 'Voters';

        $pencoblosans = Pencoblosan::all();

        $belum_cobloses = User::where('role', false)
            ->whereDoesntHave('pencoblosan')
            ->get();


        return view('admin.voters', compact('title', 'pencoblosans', 'belum_cobloses'));
    }

    public function report()
    {
        $title = 'Report';

        $anggota_aktifs = AnggotaAktif::with('user')
            ->orderBy('tanggal', 'desc')
            ->get();

        $albs = AnggotaLuarBiasa::orderBy('tanggal', 'desc')->get();

        $anggota_mudas = AnggotaMuda::orderBy('tanggal', 'desc')->get();

        $lembaga_lainnyas = LembagaLainnya::orderBy('tanggal', 'desc')->get();

        return view('admin.report', compact('title', 'anggota_aktifs', 'albs', 'anggota_mudas', 'lembaga_lainnyas'));
    }

    public function real_count()
    {
        $title = "Real Count";

        $candidates = Candidat::with('pencoblosans')->orderBy('nomor_urut', 'asc')->get();

        return view('admin.real_count', compact('title', 'candidates'));
    }
}
