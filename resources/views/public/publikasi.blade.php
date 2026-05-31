@extends('layouts.app')

@section('content')
    <style>
        .publication-header {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
        }

        .publication-header h1 {
            margin: 0;
            font-size: 32px;
        }

        .publication-header p {
            color: #4b5563;
            margin-top: 10px;
        }

        .publication-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .publication-card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .publication-card h2 {
            margin-top: 0;
            color: #111827;
            font-size: 22px;
        }

        .publication-meta {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .abstract {
            color: #374151;
            line-height: 1.8;
            text-align: justify;
        }

        .badge-published {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        @media(max-width: 900px) {
            .publication-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="publication-header">
        <h1>Publikasi Naskah</h1>
        <p>Daftar naskah yang telah diterima dan dipublikasikan melalui sistem PUSAKA.</p>
    </div>

    <div class="publication-grid">

        @forelse($publikasi as $item)
            <div class="publication-card">

                <span class="badge-published">
                    Dipublikasikan
                </span>

                <h2>{{ $item->judul_naskah }}</h2>

                <div class="publication-meta">
                    <b>Penulis:</b> {{ $item->nama }} <br>
                    <b>Instansi:</b> {{ $item->instansi ?? '-' }} <br>
                    <b>Kategori:</b> {{ $item->kategori_naskah ?? '-' }} <br>
                    <b>Nomor:</b> {{ $item->nomor_pendaftaran }}
                </div>

                <p class="abstract">
                    {{ \Illuminate\Support\Str::limit($item->abstrak, 180) }}
                </p>

                <br>

                <a class="btn" href="/publikasi/{{ $item->nomor_pendaftaran }}">
                    Baca Detail
                </a>

                @if ($item->file_pendukung)
                    <a class="btn" href="{{ asset('storage/' . $item->file_pendukung) }}" target="_blank">
                        Download
                    </a>
                @endif

            </div>

        @empty

            <div class="publication-card">
                <h2>Belum ada publikasi</h2>
                <p>Belum ada naskah yang berstatus dipublikasikan.</p>
            </div>
        @endforelse

    </div>
@endsection
