@extends('layouts.app')

@section('content')
    <h1>Publikasi Naskah</h1>

    <p>Daftar naskah yang telah diterima dan dipublikasikan.</p>

    <table>
        <tr>
            <th>No</th>
            <th>Nomor Naskah</th>
            <th>Judul Naskah</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>File</th>
        </tr>

        @forelse($publikasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_pendaftaran }}</td>
                <a href="/publikasi/{{ $item->nomor_pendaftaran }}">
                    {{ $item->judul_naskah }}
                </a>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori_naskah }}</td>
                <td>{{ $item->status_seleksi }}</td>
                <td>
                    @if ($item->file_pendukung)
                        <a href="{{ asset('storage/' . $item->file_pendukung) }}" target="_blank">Lihat Naskah</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" style="text-align:center;">Belum ada naskah yang dipublikasikan.</td>
            </tr>
        @endforelse
    </table>
@endsection
