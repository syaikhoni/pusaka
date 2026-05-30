@extends('layouts.app')

@section('content')
    <div class="dashboard-header">
        <h1>Dashboard Admin PUSAKA</h1>
        <p>Sistem pengelolaan naskah, review editor, dan publikasi karya tulis.</p>
    </div>

    <div class="dashboard-grid">

        <div class="card">
            <h2>{{ $totalNaskah }}</h2>
            <p>Total Naskah</p>
        </div>

        <div class="card">
            <h2>{{ $menungguReview }}</h2>
            <p>Menunggu Review</p>
        </div>

        <div class="card">
            <h2>{{ $sedangDireview }}</h2>
            <p>Sedang Direview</p>
        </div>

        <div class="card">
            <h2>{{ $perluRevisi }}</h2>
            <p>Perlu Revisi</p>
        </div>

        <div class="card">
            <h2>{{ $diterima }}</h2>
            <p>Diterima</p>
        </div>

        <div class="card">
            <h2>{{ $dipublikasikan }}</h2>
            <p>Dipublikasikan</p>
        </div>

    </div>

    <br><br>

    <div class="dashboard-grid">

        <div class="card">
            <h2>Review Naskah</h2>
            <p>Verifikasi administrasi dan proses review naskah.</p>
            <a href="/admin/pendaftar">Buka →</a>
        </div>

        <div class="card">
            <h2>Publikasi</h2>
            <p>Lihat daftar naskah yang sudah dipublikasikan.</p>
            <a href="/publikasi">Buka →</a>
        </div>

    </div>
@endsection
