<?php

namespace App\Http\Controllers;

use App\Models\AnggotaMuda;
use App\Models\AnggotaAktif;
use Illuminate\Http\Request;
use App\Models\LembagaLainnya;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AnggotaLuarBiasa;
use App\Models\User;

class ReportController extends Controller
{
    public function viewPdf()
    {
        $users = User::all();
        $anggota_mudas = AnggotaMuda::all();
        $lembaga_lainnyas = LembagaLainnya::all();
        $anggota_luarBiasas = AnggotaLuarBiasa::all();
        $pdf = Pdf::loadView('admin.report_pdf', compact('users', 'anggota_mudas', 'lembaga_lainnyas'));
        return $pdf->stream('report.pdf'); // langsung buka PDF di browser
    }
}
