@extends('layouts.app')

@section('content')
    <h1>Publikasi Naskah</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>

        @foreach ($pendaftars as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul_naskah }}</td>
                <td>{{ $item->kategori_naskah }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <a href="/publikasi/{{ $item->nomor_pendaftaran }}">
                        Baca
                    </a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
