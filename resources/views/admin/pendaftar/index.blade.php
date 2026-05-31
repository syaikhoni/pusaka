@extends('layouts.app')

@section('content')
    <div class="dashboard-header">
        <h1>Manajemen Review Naskah</h1>
        <p>Daftar seluruh naskah yang masuk ke sistem PUSAKA.</p>
    </div>

    <form method="GET" action="/admin/pendaftar" style="margin-bottom:20px;">
        <input type="text" name="cari" placeholder="Cari nomor, judul, atau penulis" value="{{ request('cari') }}">

        <select name="status">
            <option value="">Semua Status</option>
            <option value="Menunggu Review" {{ request('status') == 'Menunggu Review' ? 'selected' : '' }}>Menunggu Review
            </option>
            <option value="Sedang Direview" {{ request('status') == 'Sedang Direview' ? 'selected' : '' }}>Sedang Direview
            </option>
            <option value="Perlu Revisi" {{ request('status') == 'Perlu Revisi' ? 'selected' : '' }}>Perlu Revisi</option>
            <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="Dipublikasikan" {{ request('status') == 'Dipublikasikan' ? 'selected' : '' }}>Dipublikasikan
            </option>
        </select>

        <br><br>

        <button type="submit">Filter</button>
        <a class="btn" href="/admin/pendaftar">Reset</a>
    </form>

    @if (session('success'))
        <div style="background:#dcfce7;padding:15px;border-radius:10px;margin-bottom:20px;color:#166534;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor</th>
                    <th>Judul Naskah</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pendaftars as $pendaftar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pendaftar->nomor_pendaftaran }}</td>
                        <td>{{ $pendaftar->judul_naskah }}</td>
                        <td>{{ $pendaftar->nama }}</td>
                        <td>{{ $pendaftar->kategori_naskah }}</td>
                        <td><b>{{ $pendaftar->status_seleksi }}</b></td>
                        <td>
                            <a class="btn" href="/admin/pendaftar/{{ $pendaftar->id }}">
                                Detail Review
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center;">
                            Belum ada data naskah.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
