@extends('layouts.app')

@section('content')
    <div style="background:white;padding:30px;border-radius:12px;">

        <h1>{{ $pendaftar->judul_naskah }}</h1>

        <p>
            <b>Penulis:</b>
            {{ $pendaftar->nama }}
        </p>

        <p>
            <b>Kategori:</b>
            {{ $pendaftar->kategori_naskah }}
        </p>

        <p>
            <b>Instansi:</b>
            {{ $pendaftar->instansi }}
        </p>

        <hr>

        <h3>Abstrak</h3>

        <p>
            {{ $pendaftar->abstrak }}
        </p>

        <hr>

        <a target="_blank" href="{{ asset('storage/' . $pendaftar->file_pendukung) }}">
            Download Naskah
        </a>

    </div>
@endsection
