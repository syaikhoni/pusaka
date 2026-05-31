@extends('layouts.app')

@section('content')
    <style>
        body {
            background:
                linear-gradient(180deg,
                    rgba(12, 8, 3, 0.72),
                    rgba(23, 14, 6, 0.93)),
                url('/images/library-bg.jpg') center/cover fixed no-repeat !important;

            color: #f8f3e9;
            background-color: #1a1203 !important;
        }


        .container,
        .navbar {
            position: relative;
            z-index: 10;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.88);
            color: #111827;
            padding: 70px;
            text-align: center;
            border-radius: 18px;

            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.28);
        }

        .hero-card h1 {
            margin: 0;
            font-size: 58px;
            font-weight: 800;
            color: #2563eb;
            letter-spacing: 2px;
        }

        .hero-card h3 {
            margin-top: 12px;
            font-size: 24px;
            color: #374151;
        }

        .hero-card p {
            max-width: 760px;
            margin: 18px auto 0;
            color: #4b5563;
            line-height: 1.8;
        }

        .hero-actions {
            margin-top: 30px;
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-secondary {
            background: #16a34a;
        }

        .btn-secondary:hover {
            background: #15803d;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 14px;
            text-align: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.14);
            color: #111827;
        }

        .info-card h2 {
            font-size: 38px;
            margin: 0;
            color: #2563eb;
        }

        .info-card h3 {
            margin-top: 0;
        }

        .info-card p {
            color: #4b5563;
            line-height: 1.6;
        }

        .info-card a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .info-card a:hover {
            text-decoration: underline;
        }

        .steps-card {
            background: rgba(255, 255, 255, 0.92);
            padding: 30px;
            border-radius: 14px;
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.14);
            color: #111827;
        }

        .steps-card h2 {
            margin-top: 0;
            color: #111827;
        }

        .steps-card ol {
            line-height: 2;
            color: #374151;
        }

        .section-title {
            color: white;
            margin: 35px 0 18px;
            font-size: 28px;
            font-weight: 700;
        }

        @media (max-width: 900px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .hero-card {
                padding: 40px 25px;
            }

            .hero-card h1 {
                font-size: 42px;
            }

            .hero-card h3 {
                font-size: 19px;
            }
        }
    </style>

    <div class="hero-card">
        <h1>PUSAKA</h1>

        <h3>Sistem Seleksi dan Publikasi Naskah Penulis</h3>

        <p>
            PUSAKA adalah platform digital untuk pengiriman, seleksi,
            review, revisi, dan publikasi naskah penulis secara terintegrasi.
            Penulis dapat mengirimkan karya, memantau status review, dan melihat
            hasil publikasi secara online.
        </p>

        <div class="hero-actions">
            <a class="btn" href="/daftar-online">
                KIRIM NASKAH
            </a>

            <a class="btn btn-secondary" href="/cek-status">
                CEK STATUS
            </a>

            <a class="btn" href="/publikasi">
                LIHAT PUBLIKASI
            </a>
        </div>
    </div>

    <br><br>

    <div class="info-grid">

        <div class="info-card">
            <h2>{{ \App\Models\Pendaftar::count() }}</h2>
            <p>Total Naskah</p>
        </div>

        <div class="info-card">
            <h2>{{ \App\Models\Pendaftar::where('status_seleksi', 'Diterima')->count() }}</h2>
            <p>Naskah Diterima</p>
        </div>

        <div class="info-card">
            <h2>{{ \App\Models\Pendaftar::where('status_seleksi', 'Dipublikasikan')->count() }}</h2>
            <p>Dipublikasikan</p>
        </div>

        <div class="info-card">
            <h2>{{ \App\Models\Pendaftar::where('status_seleksi', 'Menunggu Review')->count() }}</h2>
            <p>Menunggu Review</p>
        </div>

    </div>

    <h2 class="section-title">Layanan PUSAKA</h2>

    <div class="info-grid">

        <div class="info-card">
            <h3>📋 Prosedur</h3>
            <p>Pelajari alur pengiriman, review, revisi, dan publikasi naskah.</p>
            <a href="/prosedur">Lihat Prosedur</a>
        </div>

        <div class="info-card">
            <h3>📝 Kirim Naskah</h3>
            <p>Unggah naskah, data penulis, abstrak, dan dokumen pendukung.</p>
            <a href="/daftar-online">Kirim Sekarang</a>
        </div>

        <div class="info-card">
            <h3>🔎 Status Naskah</h3>
            <p>Pantau proses review, catatan editor, revisi, dan publikasi.</p>
            <a href="/cek-status">Cek Status</a>
        </div>

        <div class="info-card">
            <h3>📚 Publikasi</h3>
            <p>Lihat daftar naskah yang telah diterima dan dipublikasikan.</p>
            <a href="/publikasi">Lihat Publikasi</a>
        </div>

        @guest
            <div class="info-card">
                <h3>🔐 Login Admin</h3>
                <p>Khusus admin dan reviewer untuk mengelola review naskah.</p>
                <a href="/login">Login</a>
            </div>
        @endguest

        @auth
            <div class="info-card">
                <h3>⚙️ Dashboard</h3>
                <p>Kelola data naskah, review, revisi, dan publikasi.</p>
                <a href="/admin/dashboard">Buka Dashboard</a>
            </div>
        @endauth

    </div>

    <br><br>

    <div class="steps-card">
        <h2>Alur Seleksi Naskah</h2>

        <ol>
            <li>Penulis mengirimkan naskah melalui formulir online.</li>
            <li>Admin melakukan verifikasi data penulis dan dokumen.</li>
            <li>Reviewer melakukan penilaian terhadap naskah.</li>
            <li>Jika diperlukan, penulis melakukan upload revisi naskah.</li>
            <li>Naskah dinyatakan diterima, ditolak, atau perlu revisi.</li>
            <li>Naskah yang lolos review dapat dipublikasikan.</li>
            <li>Penulis dapat memantau status menggunakan nomor pendaftaran.</li>
        </ol>
    </div>
@endsection
