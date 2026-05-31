@extends('layouts.app')

@section('content')

    <style>
        .status-box {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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

        .revisi-box {
            margin-top: 25px;
            padding: 20px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 10px;
        }
    </style>

    <div class="status-box">

        <h1>Hasil Status Naskah</h1>

        @if (session('success'))
            <div style="background:#dcfce7;color:#166534;padding:12px;border-radius:8px;margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($pendaftar)
            <div class="status-header">
                Nomor naskah ditemukan. Silakan pantau status review secara berkala.
            </div>

            <div class="row"><b>Nomor:</b> {{ $pendaftar->nomor_pendaftaran }}</div>
            <div class="row"><b>Judul Naskah:</b> {{ $pendaftar->judul_naskah ?? '-' }}</div>
            <div class="row"><b>Penulis:</b> {{ $pendaftar->nama }}</div>
            <div class="row"><b>Status Administrasi:</b> <span class="badge">{{ $pendaftar->status_verifikasi }}</span>
            </div>
            <div class="row"><b>Status Review:</b> <span class="badge">{{ $pendaftar->status_seleksi }}</span></div>
            <div class="row"><b>Catatan Reviewer:</b> {{ $pendaftar->catatan ?? '-' }}</div>

            @if ($pendaftar->file_pendukung)
                <div class="row">
                    <b>Naskah Utama:</b>
                    <a href="{{ asset('storage/' . $pendaftar->file_pendukung) }}" target="_blank">Lihat Naskah</a>
                </div>
            @endif

            @if ($pendaftar->file_revisi)
                <div class="row">
                    <b>File Revisi Terakhir:</b>
                    <a href="{{ asset('storage/' . $pendaftar->file_revisi) }}" target="_blank">Lihat Revisi</a>
                </div>
            @endif

            @if ($pendaftar->status_seleksi == 'Perlu Revisi')
                <div class="revisi-box">
                    <h3>Upload Revisi Naskah</h3>

                    <p><b>Catatan Reviewer:</b></p>
                    <p>{{ $pendaftar->catatan ?? 'Silakan unggah revisi naskah Anda.' }}</p>

                    <form action="/upload-revisi/{{ $pendaftar->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <p>File Revisi</p>
                        <input type="file" name="file_revisi" required>

                        <small>Format file: PDF, DOC, DOCX. Maksimal 5MB.</small>

                        <br><br>

                        <button type="submit">Kirim Revisi</button>
                    </form>
                </div>
            @endif

            <br>

            <a class="btn" href="/cek-status">Cek Nomor Lain</a>
            <a class="btn" href="/daftar-online">Daftar Naskah Baru</a>
        @else
            <p style="color:red;">Nomor pendaftaran tidak ditemukan.</p>
            <a class="btn" href="/cek-status">Kembali</a>
        @endif

    </div>

@endsection
