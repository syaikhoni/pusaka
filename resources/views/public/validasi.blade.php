@extends('layouts.app')

@section('content')
    <div class="card" style="max-width:700px;margin:auto;text-align:center;">

        @if ($pendaftar)
            <h1 style="color:#16a34a;">✓ Naskah Terdaftar</h1>

            <p>Data berikut tercatat resmi di sistem PUSAKA.</p>

            <hr>

            <h2>{{ $pendaftar->nomor_pendaftaran }}</h2>

            <p><b>Judul Naskah:</b> {{ $pendaftar->judul_naskah }}</p>
            <p><b>Penulis:</b> {{ $pendaftar->nama }}</p>
            <p><b>Kategori:</b> {{ $pendaftar->kategori_naskah }}</p>
            <p><b>Status Administrasi:</b> {{ $pendaftar->status_verifikasi }}</p>
            <p><b>Status Review:</b> {{ $pendaftar->status_seleksi }}</p>

            <br>

            <a class="btn" href="/cek-status">Cek Status Lengkap</a>
        @else
            <h1 style="color:#dc2626;">✕ Data Tidak Ditemukan</h1>

            <p>Nomor berikut tidak terdaftar di sistem PUSAKA:</p>

            <h2>{{ $nomor }}</h2>

            <a class="btn" href="/">Kembali</a>
        @endif

    </div>
@endsection
