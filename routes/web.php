<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('absensi');
});

Route::prefix('absensi')->group(function () {
    Route::get('/', [AbsensiController::class, 'index'])->name('absensi');

    Route::get('/anggota-muda', [AbsensiController::class, 'anggota_muda'])->name('absensi.anggota-muda');
    Route::post('/anggota-muda', [AbsensiController::class, 'store_anggota_muda'])->name('absensi.store-anggota-muda');

    Route::get('/anggota-luar-biasa', [AbsensiController::class, 'anggota_luar_biasa'])->name('absensi.anggota-luar-biasa');
    Route::post('/anggota-luar-biasa', [AbsensiController::class, 'store_anggota_luar_biasa'])->name('absensi.store-anggota-luar-biasa');

    Route::get('/lainnya', [AbsensiController::class, 'lembaga_lainnya'])->name('absensi.lembaga_lainnya');
    Route::post('/lainnya', [AbsensiController::class, 'store_lembaga_lainnya'])->name('absensi.store_lembaga_lainnya');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/vote', [VoteController::class, 'index'])->name('vote');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/candiate', [AdminController::class, 'candidate'])->name('dashboard-candidate');
    Route::get('/dashboard/candiate/add', [AdminController::class, 'candidate_add'])->name('dashboard-candidate-add');
    // Route::get('/dashboard/candiate/add', [AdminController::class, 'candidate_store'])->name('dashboard-candidate-store');

    Route::get('/dashboard/attendance', [AdminController::class, 'attendance'])->name('dashboard-attendance');

    Route::get('/dashboard/voters', [AdminController::class, 'voters'])->name('dashboard-voters');

    Route::get('/dashboard/report', [AdminController::class, 'report'])->name('dashboard-report');
});

require __DIR__ . '/auth.php';
