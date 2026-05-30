@extends('layouts.app')

@section('content')

<h1>Upload Berkas</h1>

<a href="/dashboard">Kembali</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="/berkas" method="POST" enctype="multipart/form-data">
    @csrf

    <p>Jenis Berkas</p>
    <select name="jenis_berkas" required>
        <option value="">-- Pilih Berkas --</option>
        <option value="KTP">KTP</option>
        <option value="KK">KK</option>
        <option value="Ijazah">Ijazah</option>
        <option value="Transkrip">Transkrip</option>
        <option value="Pas Foto">Pas Foto</option>
        <option value="Sertifikat">Sertifikat</option>
    </select>

    <p>File</p>
    <input type="file" name="file" required>

    <br><br>
    <button type="submit">Upload</button>
</form>

<hr>

<h2>Daftar Berkas Saya</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Jenis Berkas</th>
        <th>File</th>
        <th>Status</th>
        <th>Catatan</th>
    </tr>

    @foreach($berkas as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->jenis_berkas }}</td>
        <td>
            <a href="{{ asset('storage/' . $item->file) }}" target="_blank">Lihat File</a>
        </td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->catatan ?? '-' }}</td>
    </tr>
    @endforeach
</table>

@endsection