<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('absensi')->group(function () {
    Route::get('/', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('/anggota-aktif', [AbsensiController::class, 'anggota_aktif'])->name('absensi.anggota-aktif');
    Route::get('/anggota-muda', [AbsensiController::class, 'anggota_muda'])->name('absensi.anggota-muda');
    Route::get('/anggota-luar-biasa', [AbsensiController::class, 'anggota_luar_biasa'])->name('absensi.anggota-luar-biasa');
    Route::get('/lainnya', [AbsensiController::class, 'lainnya'])->name('absensi.lainnya');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
