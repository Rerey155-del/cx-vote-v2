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
        $anggota_aktifs = AnggotaAktif::all();
        $albs = AnggotaLuarBiasa::orderBy('tanggal', 'desc')->get();
        $anggota_mudas = AnggotaMuda::all();
        $lembaga_lainnyas = LembagaLainnya::all();
        $anggota_luarBiasas = AnggotaLuarBiasa::all();
        $pdf = Pdf::loadView('admin.report_pdf', compact('anggota_aktifs', 'albs', 'anggota_mudas', 'lembaga_lainnyas'));
        return $pdf->stream('report.pdf'); // langsung buka PDF di browser
    }
}
