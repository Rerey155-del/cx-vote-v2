<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $candidates = Candidat::orderBy('nomor_urut', 'asc')->get();
        return view('vote', compact('candidates'));
    }
}
