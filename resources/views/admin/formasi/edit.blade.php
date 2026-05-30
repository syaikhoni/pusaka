@extends('layouts.app')

@section('content')

<h1>Edit Formasi</h1>

<a href="/admin/formasi">Kembali</a>

<form action="/admin/formasi/{{ $formasi->id }}" method="POST">
    @csrf
    @method('PUT')

    <p>Nama Formasi</p>
    <input type="text" name="nama_formasi" value="{{ $formasi->nama_formasi }}" required>

    <p>Kuota</p>
    <input type="number" name="kuota" value="{{ $formasi->kuota }}" required>

    <p>Lokasi</p>
    <input type="text" name="lokasi" value="{{ $formasi->lokasi }}">

    <p>Syarat</p>
    <textarea name="syarat">{{ $formasi->syarat }}</textarea>

    <br><br>

    <button type="submit">Update</button>
</form>

@endsection