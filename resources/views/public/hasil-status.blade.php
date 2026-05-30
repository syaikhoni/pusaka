@extends('layouts.app')

@section('content')

<style>
    .status-box {
        max-width: 750px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .status-header {
        background: #dcfce7;
        color: #166534;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .row {
        margin-bottom: 12px;
    }

    .badge {
        padding: 6px 10px;
        border-radius: 6px;
        background: #fef3c7;
        color: #92400e;
        font-weight: bold;
    }
</style>

<div class="status-box">

    <h1>Hasil Status Pendaftaran</h1>

    @if($pendaftar)

        <div class="status-header">
            Nomor Pendaftaran ditemukan. Silakan pantau status verifikasi Anda secara berkala.
        </div>

        <div class="row"><b>Nomor:</b> {{ $pendaftar->nomor_pendaftaran }}</div>
        <div class="row"><b>Nama:</b> {{ $pendaftar->nama }}</div>
        <div class="row"><b>NIK:</b> {{ $pendaftar->nik }}</div>
        <div class="row"><b>Status Berkas:</b> <span class="badge">{{ $pendaftar->status_verifikasi }}</span></div>
        <div class="row"><b>Status Review Naskah:</b> <span class="badge">{{ $pendaftar->status_seleksi }}</span></div>
        <div class="row"><b>Catatan:</b> {{ $pendaftar->catatan ?? '-' }}</div>

        <br>

        <a class="btn" href="/cek-status">Cek Nomor Lain</a>
        <a class="btn" href="/daftar-online">Daftar Online</a>

    @else

        <p style="color:red;">Nomor pendaftaran tidak ditemukan.</p>
        <a class="btn" href="/cek-status">Kembali</a>

    @endif

</div>

@endsection