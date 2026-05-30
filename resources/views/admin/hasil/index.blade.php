@extends('layouts.app')

@section('content')

<h1>Input Hasil Seleksi</h1>

<a href="/admin/dashboard">Kembali</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="/admin/hasil-seleksi" method="POST">
    @csrf

    <p>Peserta</p>
    <select name="user_id" required>
        <option value="">-- Pilih Peserta --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
        @endforeach
    </select>

    <p>Nilai</p>
    <input type="text" name="nilai">

    <p>Status</p>
    <select name="status" required>
        <option value="Belum Ada">Belum Ada</option>
        <option value="Lulus">Lulus</option>
        <option value="Cadangan">Cadangan</option>
        <option value="Tidak Lulus">Tidak Lulus</option>
    </select>

    <p>Keterangan</p>
    <textarea name="keterangan"></textarea>

    <br><br>
    <button type="submit">Simpan Hasil</button>
</form>

<hr>

<h2>Data Hasil Seleksi</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Peserta</th>
        <th>Email</th>
        <th>Nilai</th>
        <th>Status</th>
        <th>Keterangan</th>
    </tr>

    @foreach($hasil as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->user->name }}</td>
        <td>{{ $item->user->email }}</td>
        <td>{{ $item->nilai }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->keterangan }}</td>
    </tr>
    @endforeach
</table>

@endsection