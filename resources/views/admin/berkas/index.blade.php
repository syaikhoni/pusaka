@extends('layouts.app')

@section('content')

<h1>Verifikasi Berkas Peserta</h1>

<a href="/admin/dashboard">Kembali</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Peserta</th>
        <th>Email</th>
        <th>Jenis Berkas</th>
        <th>File</th>
        <th>Status</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>

    @foreach($berkas as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->user->email }}</td>
        <td>{{ $item->jenis_berkas }}</td>
        <td>
            <a href="{{ asset('storage/' . $item->file) }}" target="_blank">Lihat</a>
        </td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->catatan ?? '-' }}</td>
        <td>
            <form action="/admin/berkas/{{ $item->id }}/verifikasi" method="POST">
                @csrf

                <select name="status">
                    <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Diterima" {{ $item->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="Perbaikan" {{ $item->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                </select>

                <br><br>

                <textarea name="catatan" placeholder="Catatan">{{ $item->catatan }}</textarea>

                <br><br>

                <button type="submit">Simpan</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection