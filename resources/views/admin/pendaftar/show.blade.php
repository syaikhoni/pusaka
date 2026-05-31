@extends('layouts.app')

@section('content')
    <div class="dashboard-header">
        <h1>Detail Review Naskah</h1>
        <p>Nomor: {{ $pendaftar->nomor_pendaftaran }}</p>
    </div>

    @if (session('success'))
        <div style="background:#dcfce7;color:#166534;padding:15px;border-radius:10px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <h2>{{ $pendaftar->judul_naskah }}</h2>

        <p><b>Penulis:</b> {{ $pendaftar->nama }}</p>
        <p><b>Instansi:</b> {{ $pendaftar->instansi ?? '-' }}</p>
        <p><b>Kategori:</b> {{ $pendaftar->kategori_naskah ?? '-' }}</p>

        <p>
            <b>Status Administrasi:</b>
            <span style="padding:6px 10px;background:#dbeafe;border-radius:8px;">
                {{ $pendaftar->status_verifikasi }}
            </span>
        </p>

        <p>
            <b>Status Review:</b>
            <span style="padding:6px 10px;background:#fef3c7;border-radius:8px;">
                {{ $pendaftar->status_seleksi }}
            </span>
        </p>

        <hr>

        <h3>Abstrak</h3>
        <p style="line-height:1.8;text-align:justify;">
            {{ $pendaftar->abstrak ?? '-' }}
        </p>

        <hr>

        <h3>Data Penulis</h3>

        <p><b>NIK:</b> {{ $pendaftar->nik }}</p>
        <p><b>Tempat Lahir:</b> {{ $pendaftar->tempat_lahir }}</p>
        <p><b>Tanggal Lahir:</b> {{ $pendaftar->tanggal_lahir }}</p>
        <p><b>Jenis Kelamin:</b> {{ $pendaftar->jenis_kelamin }}</p>
        <p><b>Alamat:</b> {{ $pendaftar->alamat }}</p>
        <p><b>No HP:</b> {{ $pendaftar->no_hp }}</p>
        <p><b>Email:</b> {{ $pendaftar->email ?? '-' }}</p>

        <hr>

        <h3>Dokumen Penulis</h3>

        @if ($pendaftar->ktp)
            <p>
                <a class="btn" href="{{ asset('storage/' . $pendaftar->ktp) }}" target="_blank">
                    Lihat Identitas Penulis
                </a>
            </p>
        @endif

        @if ($pendaftar->ijazah)
            <p>
                <a class="btn" href="{{ asset('storage/' . $pendaftar->ijazah) }}" target="_blank">
                    Lihat Dokumen Pendukung
                </a>
            </p>
        @endif

        @if ($pendaftar->pas_foto)
            <p>
                <a class="btn" href="{{ asset('storage/' . $pendaftar->pas_foto) }}" target="_blank">
                    Lihat Foto Penulis
                </a>
            </p>
        @endif

        <hr>

        <h3>Naskah</h3>

        @if ($pendaftar->file_pendukung)
            <p>
                <a class="btn" href="{{ asset('storage/' . $pendaftar->file_pendukung) }}" target="_blank">
                    Lihat Naskah Utama
                </a>
            </p>
        @endif

        @if ($pendaftar->file_revisi)
            <p>
                <a class="btn" href="{{ asset('storage/' . $pendaftar->file_revisi) }}" target="_blank">
                    Lihat File Revisi
                </a>
            </p>
        @endif
    </div>

    <br>

    <div class="card">
        <h2>Form Review Editor</h2>

        <form action="/admin/pendaftar/{{ $pendaftar->id }}/verifikasi" method="POST">
            @csrf

            <p>Status Administrasi</p>
            <select name="status_verifikasi">
                <option value="Menunggu Verifikasi"
                    {{ $pendaftar->status_verifikasi == 'Menunggu Verifikasi' ? 'selected' : '' }}>
                    Menunggu Verifikasi
                </option>
                <option value="Diterima" {{ $pendaftar->status_verifikasi == 'Diterima' ? 'selected' : '' }}>
                    Diterima
                </option>
                <option value="Perbaikan" {{ $pendaftar->status_verifikasi == 'Perbaikan' ? 'selected' : '' }}>
                    Perbaikan
                </option>
                <option value="Ditolak" {{ $pendaftar->status_verifikasi == 'Ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>
            </select>

            <p>Status Review Naskah</p>
            <select name="status_seleksi">
                <option value="Menunggu Review" {{ $pendaftar->status_seleksi == 'Menunggu Review' ? 'selected' : '' }}>
                    Menunggu Review
                </option>
                <option value="Sedang Direview" {{ $pendaftar->status_seleksi == 'Sedang Direview' ? 'selected' : '' }}>
                    Sedang Direview
                </option>
                <option value="Perlu Revisi" {{ $pendaftar->status_seleksi == 'Perlu Revisi' ? 'selected' : '' }}>
                    Perlu Revisi
                </option>
                <option value="Diterima" {{ $pendaftar->status_seleksi == 'Diterima' ? 'selected' : '' }}>
                    Diterima
                </option>
                <option value="Ditolak" {{ $pendaftar->status_seleksi == 'Ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>
                <option value="Dipublikasikan" {{ $pendaftar->status_seleksi == 'Dipublikasikan' ? 'selected' : '' }}>
                    Dipublikasikan
                </option>
            </select>

            <p>Catatan Reviewer / Editor</p>
            <textarea name="catatan" rows="5">{{ $pendaftar->catatan }}</textarea>

            <br><br>

            <button type="submit">Simpan Review</button>
            <a class="btn" href="/admin/pendaftar">Kembali</a>
        </form>
    </div>

    <br>

    <div class="card">
        <h2>Riwayat Review</h2>

        @forelse($pendaftar->histories()->latest()->get() as $history)
            <div
                style="
            border-left:5px solid #2563eb;
            padding:15px;
            margin-bottom:15px;
            background:#f8fafc;
            border-radius:10px;
        ">

                <p style="margin:0 0 8px;">
                    <b>Tanggal:</b>
                    {{ $history->created_at->format('d-m-Y H:i') }}
                </p>

                <p style="margin:0 0 8px;">
                    <b>Reviewer:</b>
                    {{ $history->reviewer ?? '-' }}
                </p>

                <p style="margin:0 0 8px;">
                    <b>Status Administrasi:</b>
                    {{ $history->status_verifikasi ?? '-' }}
                </p>

                <p style="margin:0 0 8px;">
                    <b>Status Review:</b>
                    {{ $history->status_seleksi ?? '-' }}
                </p>

                <p style="margin:0;">
                    <b>Catatan:</b>
                    {{ $history->catatan ?: '-' }}
                </p>

            </div>

        @empty

            <p>Belum ada riwayat review.</p>
        @endforelse
    </div>
@endsection
