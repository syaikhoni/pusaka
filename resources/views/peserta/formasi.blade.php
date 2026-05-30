@extends('layouts.app')

@section('content')

<h1>Pendaftaran Formasi</h1>

<a href="/dashboard">Kembali</a>

@if(session('success'))

<p style="color:green">{{ session('success') }}</p>
@endif

@if(session('error'))

<p style="color:red">{{ session('error') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Formasi</th>
        <th>Kuota</th>
        <th>Lokasi</th>
        <th>Syarat</th>
        <th>Aksi</th>
    </tr>

    @foreach($formasis as $formasi)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $formasi->nama_formasi }}</td>
        <td>{{ $formasi->kuota }}</td>
        <td>{{ $formasi->lokasi }}</td>
        <td>{{ $formasi->syarat }}</td>
        <td>
            <form action="/daftar-formasi/{{ $formasi->id }}" method="POST">
                @csrf
                <button type="submit">
                    Daftar
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
