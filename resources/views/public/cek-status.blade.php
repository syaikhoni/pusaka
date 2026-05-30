@extends('layouts.app')

@section('content')

<style>
    .cek-box {
        max-width: 600px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
</style>

<div class="cek-box">
    <h1>Cek Status Pendaftaran</h1>

    <p>Masukkan nomor pendaftaran Anda.</p>

    <form action="/cek-status" method="POST">
        @csrf

        <p>Nomor Pendaftaran</p>
        <input type="text" name="nomor_pendaftaran" placeholder="Contoh: PSK-2026-00001" required>

        <br><br>

        <button type="submit" class="btn">Cek Status</button>
    </form>
</div>

@endsection