<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormasiController;
use App\Http\Controllers\PendaftarController;

// ==========================
// HALAMAN PUBLIK
// ==========================

Route::get('/', function () {
    return view('public.home');
});

Route::get('/prosedur', function () {
    return view('public.prosedur');
});

Route::get('/daftar-online', [PendaftarController::class, 'create']);
Route::post('/daftar-online', [PendaftarController::class, 'store']);

Route::get('/daftar-online/sukses/{nomor}', [PendaftarController::class, 'sukses']);

Route::get('/cek-status', [PendaftarController::class, 'cekStatus']);
Route::post('/cek-status', [PendaftarController::class, 'hasilStatus']);

Route::get('/publikasi', [PendaftarController::class, 'publikasi']);
Route::get('/publikasi/{nomor}', [PendaftarController::class, 'detailPublikasi']);


// ==========================
// DASHBOARD ADMIN
// ==========================

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        $totalNaskah = \App\Models\Pendaftar::count();

        $menungguReview = \App\Models\Pendaftar::where('status_seleksi', 'Menunggu Review')->count();
        $sedangDireview = \App\Models\Pendaftar::where('status_seleksi', 'Sedang Direview')->count();
        $perluRevisi = \App\Models\Pendaftar::where('status_seleksi', 'Perlu Revisi')->count();
        $diterima = \App\Models\Pendaftar::where('status_seleksi', 'Diterima')->count();
        $dipublikasikan = \App\Models\Pendaftar::where('status_seleksi', 'Dipublikasikan')->count();

        return view('admin.dashboard', compact(
            'totalNaskah',
            'menungguReview',
            'sedangDireview',
            'perluRevisi',
            'diterima',
            'dipublikasikan'
        ));
    })->name('admin.dashboard');

    Route::get('/admin/pendaftar', [PendaftarController::class, 'adminIndex']);
    Route::post('/admin/pendaftar/{id}/verifikasi', [PendaftarController::class, 'verifikasi']);

    Route::resource('/admin/formasi', FormasiController::class);
});


// ==========================
// PROFILE BAWAAN BREEZE
// ==========================

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/admin/dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';