@extends('layouts.app')

@section('content')

<div style="background:#0f172a;color:white;padding:70px;text-align:center;border-radius:15px;">
    <h1>PUSAKA</h1>
    <h3>Sistem Pendaftaran Formasi dan Seleksi Administrasi</h3>

    <br>

    <a class="btn" href="/daftar-online">DAFTAR ONLINE</a>
</div>

<br><br>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;">

    <div style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>📋 Prosedur</h3>
        <p>Alur pendaftaran peserta.</p>
        <a href="/prosedur">Lihat</a>
    </div>

    <div style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>📝 Daftar Online</h3>
        <p>Isi formulir pendaftaran.</p>
        <a href="/daftar-online">Daftar</a>
    </div>

    <div style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>🔎 Cek Status</h3>
        <p>Cek status pendaftaran.</p>
        <a href="/cek-status">Cek</a>
    </div>

    @guest
    <div style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>🔐 Login Admin</h3>
        <p>Khusus administrator.</p>
        <a href="/login">Login</a>
    </div>
    @endguest

    @auth
    <div style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>⚙️ Dashboard Admin</h3>
        <p>Kelola data pendaftaran.</p>
        <a href="/admin/dashboard">Buka</a>
    </div>
    @endauth

</div>

<br><br>

<div style="background:white;padding:25px;border-radius:12px;">

    <h2>Alur Pendaftaran</h2>

    <ol>
        <li>Pilih kategori pendaftar</li>
        <li>Pilih formasi yang tersedia</li>
        <li>Unggah berkas persyaratan</li>
        <li>Lengkapi identitas pemohon</li>
        <li>Kirim pendaftaran</li>
        <li>Simpan nomor pendaftaran</li>
        <li>Cek status verifikasi secara berkala</li>
    </ol>

</div>

@endsection