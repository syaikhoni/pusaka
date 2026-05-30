@extends('layouts.app')

@section('content')

<style>
    .success-box {
        max-width: 750px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .nomor {
        background: #dcfce7;
        color: #166534;
        padding: 18px;
        border-radius: 8px;
        font-size: 28px;
        font-weight: bold;
        margin: 20px 0;
    }

    .info {
        text-align: left;
        margin-top: 25px;
    }
</style>

<div class="success-box">

    <h1>Pendaftaran Berhasil</h1>

    <p>Data pendaftaran Anda berhasil dikirim dan sedang menunggu verifikasi admin.</p>

    <h3>Nomor Pendaftaran</h3>

    <div class="nomor">
        {{ $pendaftar->nomor_pendaftaran }}
    </div>

    <p><b>Simpan nomor pendaftaran ini.</b></p>
    <p>Nomor ini digunakan untuk mengecek status verifikasi dan hasil seleksi.</p>

    <div class="info">
        <p><b>Nama:</b> {{ $pendaftar->nama }}</p>
        <p><b>NIK:</b> {{ $pendaftar->nik }}</p>
        <p><b>Status Verifikasi:</b> {{ $pendaftar->status_verifikasi }}</p>
        <p><b>Status Seleksi:</b> {{ $pendaftar->status_seleksi }}</p>
    </div>

    <br>

    <a class="btn" href="/cek-status">Cek Status</a>
    <a class="btn" href="/daftar-online">Daftar Lagi</a>

</div>

@endsection