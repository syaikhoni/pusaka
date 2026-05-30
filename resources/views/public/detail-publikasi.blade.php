@extends('layouts.app')

@section('content')
    <div style="background:white;padding:30px;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,0.08);">

        <h1>{{ $artikel->judul_naskah }}</h1>

        <p>
            <b>Penulis:</b> {{ $artikel->nama }} <br>
            <b>Instansi:</b> {{ $artikel->instansi ?? '-' }} <br>
            <b>Kategori:</b> {{ $artikel->kategori_naskah }} <br>
            <b>Nomor Naskah:</b> {{ $artikel->nomor_pendaftaran }} <br>
            <b>Tanggal Publikasi:</b> {{ $artikel->updated_at->format('d-m-Y') }}
        </p>

        <hr>

        <h3>Abstrak</h3>

        <p style="line-height:1.8;text-align:justify;">
            {{ $artikel->abstrak }}
        </p>

        <br>

        @if ($artikel->file_pendukung)
            <a class="btn" href="{{ asset('storage/' . $artikel->file_pendukung) }}" target="_blank">
                Download / Lihat Naskah
            </a>
        @endif

        <a class="btn" href="/publikasi">
            Kembali
        </a>

    </div>
@endsection
