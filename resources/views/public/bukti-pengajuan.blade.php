@extends('layouts.app')

@section('content')
    <div style="background:white;padding:30px;border-radius:15px;max-width:800px;margin:auto;">

        <h1>Bukti Pengajuan Naskah</h1>

        <hr>

        <p><b>Nomor Naskah:</b> {{ $pendaftar->nomor_pendaftaran }}</p>
        <p><b>Judul Naskah:</b> {{ $pendaftar->judul_naskah }}</p>
        <p><b>Kategori:</b> {{ $pendaftar->kategori_naskah }}</p>
        <p><b>Penulis:</b> {{ $pendaftar->nama }}</p>
        <p><b>Instansi:</b> {{ $pendaftar->instansi }}</p>
        <p><b>Email:</b> {{ $pendaftar->email }}</p>
        <p><b>No HP:</b> {{ $pendaftar->no_hp }}</p>
        <p><b>Status Administrasi:</b> {{ $pendaftar->status_verifikasi }}</p>
        <p><b>Status Review:</b> {{ $pendaftar->status_seleksi }}</p>

        <hr>

        <p>Simpan bukti ini sebagai tanda pengajuan naskah ke sistem PUSAKA.</p>

        <button onclick="window.print()">Cetak Bukti</button>
        <a class="btn" href="/cek-status">Cek Status</a>

    </div>
@endsection
