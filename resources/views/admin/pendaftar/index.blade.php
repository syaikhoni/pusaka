@extends('layouts.app')

@section('content')

<h1>Manajemen Review Naskah</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>No</th>
        <th>Nomor Naskah</th>
        <th>Penulis</th>
        <th>NIK</th>
        <th>Dokumen</th>
        <th>Status Naskah</th>
        <th>Review Editor</th>
    </tr>

    @foreach($pendaftars as $pendaftar)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pendaftar->nomor_pendaftaran }}</td>
        <td>{{ $pendaftar->nama }}</td>
        <td>{{ $pendaftar->nik }}</td>

        <td>
            @if($pendaftar->ktp)
                <a href="{{ asset('storage/' . $pendaftar->ktp) }}" target="_blank">Identitas Penulis</a><br>
            @endif

            @if($pendaftar->ijazah)
                <a href="{{ asset('storage/' . $pendaftar->ijazah) }}" target="_blank">Dokumen Pendukung</a><br>
            @endif

            @if($pendaftar->pas_foto)
                <a href="{{ asset('storage/' . $pendaftar->pas_foto) }}" target="_blank">Foto Penulis</a><br>
            @endif

            @if($pendaftar->file_pendukung)
                <a href="{{ asset('storage/' . $pendaftar->file_pendukung) }}" target="_blank">Naskah / File Utama</a>
            @endif
        </td>

        <td>
            <b>Status Administrasi:</b> {{ $pendaftar->status_verifikasi }}<br>
            <b>Status Review:</b> {{ $pendaftar->status_seleksi }}<br>
            <b>Catatan:</b> {{ $pendaftar->catatan ?? '-' }}
        </td>

        <td>
            <form action="/admin/pendaftar/{{ $pendaftar->id }}/verifikasi" method="POST">
                @csrf

                <p>Status Administrasi</p>
                <select name="status_verifikasi">
                    <option value="Menunggu Verifikasi" {{ $pendaftar->status_verifikasi == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                    <option value="Diterima" {{ $pendaftar->status_verifikasi == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Perbaikan" {{ $pendaftar->status_verifikasi == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    <option value="Ditolak" {{ $pendaftar->status_verifikasi == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <p>Status Review Naskah</p>
                <select name="status_seleksi">
                    <option value="Menunggu Review" {{ $pendaftar->status_seleksi == 'Menunggu Review' ? 'selected' : '' }}>Menunggu Review</option>
                    <option value="Sedang Direview" {{ $pendaftar->status_seleksi == 'Sedang Direview' ? 'selected' : '' }}>Sedang Direview</option>
                    <option value="Perlu Revisi" {{ $pendaftar->status_seleksi == 'Perlu Revisi' ? 'selected' : '' }}>Perlu Revisi</option>
                    <option value="Diterima" {{ $pendaftar->status_seleksi == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ $pendaftar->status_seleksi == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="Dipublikasikan" {{ $pendaftar->status_seleksi == 'Dipublikasikan' ? 'selected' : '' }}>Dipublikasikan</option>
                </select>

                <p>Catatan Editor</p>
                <textarea name="catatan">{{ $pendaftar->catatan }}</textarea>

                <br><br>

                <button type="submit">Simpan Review</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection