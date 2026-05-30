@extends('layouts.app')

@section('content')

<h1>Biodata Peserta</h1>

<a href="/dashboard">Kembali</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="/peserta/biodata" method="POST">
    @csrf

    <p>NIK</p>
    <input type="text" name="nik" value="{{ $peserta->nik ?? '' }}" required>

    <p>Tempat Lahir</p>
    <input type="text" name="tempat_lahir" value="{{ $peserta->tempat_lahir ?? '' }}" required>

    <p>Tanggal Lahir</p>
    <input type="date" name="tanggal_lahir" value="{{ $peserta->tanggal_lahir ?? '' }}" required>

    <p>Jenis Kelamin</p>
    <select name="jenis_kelamin" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" {{ ($peserta->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ ($peserta->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>

    <p>Alamat</p>
    <textarea name="alamat" required>{{ $peserta->alamat ?? '' }}</textarea>

    <p>Pendidikan</p>
    <input type="text" name="pendidikan" value="{{ $peserta->pendidikan ?? '' }}" required>

    <p>No HP</p>
    <input type="text" name="no_hp" value="{{ $peserta->no_hp ?? '' }}" required>

    <br><br>
    <button type="submit">Simpan Biodata</button>
</form>

@endsection