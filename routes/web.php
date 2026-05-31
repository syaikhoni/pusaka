<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormasiController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\HasilSeleksiController;
use App\Models\Pendaftar;

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

Route::get('/bukti-pengajuan/{nomor}', [PendaftarController::class, 'buktiPengajuan']);
Route::post('/upload-revisi/{id}', [PendaftarController::class, 'uploadRevisi']);

Route::get('/publikasi', [PendaftarController::class, 'publikasi']);
Route::get('/publikasi/{nomor}', [PendaftarController::class, 'detailPublikasi']);


// ==========================
// ADMIN + REVIEWER
// ==========================

Route::middleware(['auth', 'reviewer'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {

        $totalNaskah = Pendaftar::count();

        $menungguReview = Pendaftar::where(
            'status_seleksi',
            'Menunggu Review'
        )->count();

        $sedangDireview = Pendaftar::where(
            'status_seleksi',
            'Sedang Direview'
        )->count();

        $perluRevisi = Pendaftar::where(
            'status_seleksi',
            'Perlu Revisi'
        )->count();

        $diterima = Pendaftar::where(
            'status_seleksi',
            'Diterima'
        )->count();

        $dipublikasikan = Pendaftar::where(
            'status_seleksi',
            'Dipublikasikan'
        )->count();

        return view('admin.dashboard', compact(
            'totalNaskah',
            'menungguReview',
            'sedangDireview',
            'perluRevisi',
            'diterima',
            'dipublikasikan'
        ));
    })->name('admin.dashboard');

    Route::get(
        '/pendaftar',
        [PendaftarController::class, 'adminIndex']
    );

    Route::get('/pendaftar/{id}', [PendaftarController::class, 'showAdmin']);

    Route::post(
        '/pendaftar/{id}/verifikasi',
        [PendaftarController::class, 'verifikasi']
    );
});


// ==========================
// ADMIN SAJA
// ==========================

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::resource('/formasi', FormasiController::class);

    Route::get(
        '/berkas',
        [BerkasController::class, 'adminIndex']
    );

    Route::post(
        '/berkas/{id}/verifikasi',
        [BerkasController::class, 'verifikasi']
    );

    Route::get(
        '/hasil-seleksi',
        [HasilSeleksiController::class, 'adminIndex']
    );

    Route::post(
        '/hasil-seleksi',
        [HasilSeleksiController::class, 'store']
    );
});


// ==========================
// PROFILE
// ==========================

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect('/admin/dashboard');
    })->name('dashboard');

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});



require __DIR__.'/auth.php';
