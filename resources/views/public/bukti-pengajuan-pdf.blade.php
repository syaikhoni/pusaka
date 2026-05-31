<!DOCTYPE html>
<html>

<head>
    <title>Bukti Pengajuan Naskah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 30px;
        }

        .paper {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 35px;
            border: 1px solid #ddd;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #1f2937;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #1f2937;
        }

        .nomor {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        td:first-child {
            width: 220px;
            font-weight: bold;
        }

        .qr {
            text-align: center;
            margin-top: 30px;
        }

        .footer {
            margin-top: 35px;
            font-size: 13px;
            color: #555;
            text-align: center;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .no-print {
                display: none;
            }

            .paper {
                border: none;
            }
        }
    </style>
</head>

<body>

    <div class="paper">

        <div class="header">
            <h1>PUSAKA</h1>
            <p>Sistem Seleksi dan Publikasi Naskah Penulis</p>
            <h3>Bukti Pengajuan Naskah</h3>
        </div>

        <p>Berikut adalah bukti bahwa naskah telah berhasil diajukan ke sistem PUSAKA.</p>

        <div class="nomor">
            {{ $pendaftar->nomor_pendaftaran }}
        </div>

        <table>
            <tr>
                <td>Nama Penulis</td>
                <td>{{ $pendaftar->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{{ $pendaftar->nik }}</td>
            </tr>
            <tr>
                <td>Judul Naskah</td>
                <td>{{ $pendaftar->judul_naskah }}</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>{{ $pendaftar->kategori_naskah }}</td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>{{ $pendaftar->instansi }}</td>
            </tr>
            <tr>
                <td>Status Administrasi</td>
                <td>{{ $pendaftar->status_verifikasi }}</td>
            </tr>
            <tr>
                <td>Status Review</td>
                <td>{{ $pendaftar->status_seleksi }}</td>
            </tr>
        </table>

        <div class="qr">
            <p><b>QR Validasi</b></p>

            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(url('/validasi/' . $pendaftar->nomor_pendaftaran)) }}"
                alt="QR Code">

            <p style="font-size:12px;">
                Scan QR untuk validasi keaslian bukti pengajuan.
            </p>
        </div>

        <div class="footer">
            Dokumen ini dicetak secara otomatis oleh sistem PUSAKA.
            <br>
            Tanggal cetak: {{ date('d-m-Y H:i:s') }}
        </div>

        <br>

        <div class="no-print" style="text-align:center;">
            <button onclick="window.print()">Cetak / Simpan PDF</button>
            <a href="/bukti-pengajuan/{{ $pendaftar->nomor_pendaftaran }}">Kembali</a>
        </div>

    </div>

</body>

</html>
