@extends('layouts.app')

@section('content')

<h1>Hasil Seleksi Saya</h1>

<a href="/dashboard">Kembali</a>

@if($hasil)
    <p><b>Nilai:</b> {{ $hasil->nilai ?? '-' }}</p>
    <p><b>Status:</b> {{ $hasil->status }}</p>
    <p><b>Keterangan:</b> {{ $hasil->keterangan ?? '-' }}</p>
@else
    <p>Hasil seleksi belum tersedia.</p>
@endif

@endsection