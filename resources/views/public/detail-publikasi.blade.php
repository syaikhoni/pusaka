@extends('layouts.app')

@section('content')
    <style>
        .article-box {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .article-box h1 {
            margin-top: 0;
            font-size: 34px;
            color: #111827;
        }

        .meta {
            color: #4b5563;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .abstract {
            line-height: 1.9;
            text-align: justify;
            color: #374151;
        }

        .badge {
            background: #dcfce7;
            color: #166534;
            padding: 7px 13px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 18px;
        }
    </style>

    <div class="article-box">

        <span class="badge">Dipublikasikan</span>

        <h1>{{ $artikel->judul_naskah }}</h1>

        <div class="meta">
            <b>Penulis:</b> {{ $artikel->nama }} <br>
            <b>Instansi:</b> {{ $artikel->instansi ?? '-' }} <br>
            <b>Kategori:</b> {{ $artikel->kategori_naskah ?? '-' }} <br>
            <b>Nomor Naskah:</b> {{ $artikel->nomor_pendaftaran }} <br>
            <b>Tanggal Publikasi:</b> {{ $artikel->updated_at->format('d-m-Y') }}
        </div>

        <hr>

        <h2>Abstrak</h2>

        <p class="abstract">
            {{ $artikel->abstrak }}
        </p>

        <br>

        @if ($artikel->file_pendukung)
            <a class="btn" href="{{ asset('storage/' . $artikel->file_pendukung) }}" target="_blank">
                Download Naskah
            </a>
        @endif

        <a class="btn" href="/publikasi">
            Kembali ke Publikasi
        </a>

    </div>
@endsection
