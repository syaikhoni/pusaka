@extends('layouts.app')

@section('content')
<div class="dashboard-header">
    <h1>Dashboard Peserta</h1>
    <p>Selamat datang di portal peserta. Gunakan menu di bawah untuk mengelola biodata, mendaftar karya tulis, mengunggah berkas, dan melihat hasil seleksi.</p>
</div>

<div class="dashboard-grid">
    <div class="card">
        <div>
            <h2>Isi Biodata</h2>
            <p>Lengkapi data pribadi untuk mempercepat proses pendaftaran dan validasi akun peserta.</p>
        </div>
        <a href="/peserta/biodata">Isi Biodata</a>
    </div>

    <div class="card">
        <div>
            <h2>Daftar Karya Tulis</h2>
            <p>Pilih karya tulis yang ingin diajukan dan lengkapi data pendaftaran dengan benar.</p>
        </div>
        <a href="/formasi">Lihat Karya Tulis</a>
    </div>

    <div class="card">
        <div>
            <h2>Upload Berkas</h2>
            <p>Unggah dokumen pendukung seperti identitas dan karya tulis dalam format yang sesuai.</p>
        </div>
        <a href="/berkas">Unggah Berkas</a>
    </div>

    <div class="card">
        <div>
            <h2>Cek Hasil Seleksi</h2>
            <p>Periksa status seleksi dan lihat hasil terbaru setelah proses penilaian selesai.</p>
        </div>
        <a href="/hasil-seleksi">Lihat Hasil</a>
    </div>
</div>
@endsection