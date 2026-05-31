@extends('layouts.app')

@section('content')
    <div class="dashboard-header">
        <h1>Dashboard PUSAKA</h1>

        @if (auth()->user()->role == 'admin')
            <p>Login sebagai Administrator Sistem</p>
        @endif

        @if (auth()->user()->role == 'reviewer')
            <p>Login sebagai Reviewer Naskah</p>
        @endif
    </div>

    <div class="stat-grid">

        <div class="stat-card">
            <h2>{{ $totalNaskah }}</h2>
            <p>Total Naskah</p>
        </div>

        <div class="stat-card">
            <h2>{{ $menungguReview }}</h2>
            <p>Menunggu Review</p>
        </div>

        <div class="stat-card">
            <h2>{{ $sedangDireview }}</h2>
            <p>Sedang Direview</p>
        </div>

        <div class="stat-card">
            <h2>{{ $perluRevisi }}</h2>
            <p>Perlu Revisi</p>
        </div>

        <div class="stat-card">
            <h2>{{ $diterima }}</h2>
            <p>Diterima</p>
        </div>

        <div class="stat-card">
            <h2>{{ $dipublikasikan }}</h2>
            <p>Dipublikasikan</p>
        </div>

    </div>

    <div class="dashboard-grid">

        <div class="card">
            <h2>📄 Review Naskah</h2>
            <p>Verifikasi dan review naskah penulis.</p>
            <a href="/admin/pendaftar">Kelola →</a>
        </div>

        @if (auth()->user()->role == 'admin')
            <div class="card">
                <h2>🌐 Publikasi</h2>
                <p>Kelola naskah yang dipublikasikan.</p>
                <a href="/publikasi">Lihat →</a>
            </div>

            <div class="card">
                <h2>⚙️ Master Data</h2>
                <p>Kelola kategori dan pengaturan sistem.</p>
                <a href="/admin/formasi">Kelola →</a>
            </div>
        @endif

    </div>
@endsection
