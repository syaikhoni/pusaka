@extends('layouts.app')

@section('content')

<h1>Tambah Formasi</h1>

<a href="/admin/formasi">Kembali</a>

<form action="/admin/formasi" method="POST">
    @csrf

    <p>Nama Formasi</p>
    <input type="text" name="nama_formasi" required>

    <p>Kuota</p>
    <input type="number" name="kuota" required>

    <p>Lokasi</p>
    <input type="text" name="lokasi">

    <p>Syarat</p>
    <textarea name="syarat"></textarea>

    <br><br>

    <button type="submit">Simpan</button>
</form>

@endsection