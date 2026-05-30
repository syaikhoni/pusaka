@extends('layouts.app')

@section('content')

<style>
    .wizard-box {
        max-width: 850px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .wizard-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .wizard-header h1 {
        color: #065f46;
        margin-bottom: 5px;
    }

    .steps {
        display: flex;
        margin-bottom: 25px;
        border-radius: 8px;
        overflow: hidden;
    }

    .step-tab {
        flex: 1;
        padding: 15px;
        text-align: center;
        background: #e5e7eb;
        font-weight: bold;
        border-right: 1px solid white;
    }

    .step-tab.active {
        background: #16a34a;
        color: white;
    }

    .step {
        display: none;
    }

    .step.active {
        display: block;
    }

    .btn-next {
        background: #16a34a;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-prev {
        background: #6b7280;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .mandatory {
        color: red;
    }

    input, select, textarea {
        margin-bottom: 12px;
    }

    .note {
        font-size: 13px;
        color: #555;
        margin-top: 10px;
    }
</style>

<div class="wizard-box">

    <div class="wizard-header">
        <h1>Pendaftaran Online PUSAKA</h1>
        <p>Sistem Seleksi dan Publikasi Naskah Penulis</p>
    </div>

    <div class="steps">
        <div class="step-tab active" id="tab1">1. Pendaftar</div>
        <div class="step-tab" id="tab2">2. Karya Tulis</div>
        <div class="step-tab" id="tab3">3. Identitas</div>
        <div class="step-tab" id="tab4">4. Konfirmasi</div>
    </div>

    <form action="/daftar-online" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="step active" id="step1">
            <h2>1. Kategori Pendaftar</h2>

            <p>Kategori Pendaftar <span class="mandatory">*</span></p>

            <label>
                <input type="radio" name="jenis_pendaftar" value="Umum" required>
                Umum
            </label>

            <br><br>

            <label>
                <input type="radio" name="jenis_pendaftar" value="Internal">
                Internal
            </label>

            <p class="note">(*) Mandatory / wajib diisi</p>

            <br>

            <button type="button" class="btn-next" onclick="nextStep(2)">Next</button>
        </div>

        <div class="step" id="step2">

    <h2>2. Data Karya Tulis</h2>

    <p>Judul Naskah <span class="mandatory">*</span></p>
    <input type="text" name="judul_naskah" required>

    <p>Kategori Naskah <span class="mandatory">*</span></p>
    <select name="kategori_naskah" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Artikel Ilmiah">Artikel Ilmiah</option>
        <option value="Penelitian">Penelitian</option>
        <option value="Buku">Buku</option>
        <option value="Cerpen">Cerpen</option>
        <option value="Novel">Novel</option>
        <option value="Karya Tulis Umum">Karya Tulis Umum</option>
    </select>

    <p>Instansi / Komunitas <span class="mandatory">*</span></p>
    <input type="text" name="instansi" required>

    <p>Abstrak / Ringkasan Naskah <span class="mandatory">*</span></p>
    <textarea name="abstrak" rows="6" required></textarea>

    <p>Upload Naskah Utama <span class="mandatory">*</span></p>
    <input type="file" name="file_pendukung" required>

    <p class="note">
        Format yang diperbolehkan: PDF, DOC, DOCX.
    </p>

    <br>

    <button type="button" class="btn-prev" onclick="nextStep(1)">Previous</button>
    <button type="button" class="btn-next" onclick="nextStep(3)">Next</button>

</div>

        <div class="step" id="step3">
            <h2>3. Data Penulis</h2>

            <p>NIK <span class="mandatory">*</span></p>
            <input type="text" name="nik" required>

            <p>Nama Lengkap <span class="mandatory">*</span></p>
            <input type="text" name="nama" required>

            <p>Tempat Lahir <span class="mandatory">*</span></p>
            <input type="text" name="tempat_lahir" required>

            <p>Tanggal Lahir <span class="mandatory">*</span></p>
            <input type="date" name="tanggal_lahir" required>

            <p>Jenis Kelamin <span class="mandatory">*</span></p>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <p>Alamat <span class="mandatory">*</span></p>
            <textarea name="alamat" required></textarea>

            <p>No HP <span class="mandatory">*</span></p>
            <input type="text" name="no_hp" required>

            <p>Email</p>
            <input type="email" name="email">

            <p class="note">(*) Mandatory / wajib diisi</p>

            <br>

            <button type="button" class="btn-prev" onclick="nextStep(2)">Previous</button>
            <button type="button" class="btn-next" onclick="nextStep(4)">Next</button>
        </div>

        <div class="step" id="step4">
            <h2>4. Konfirmasi Pendaftaran</h2>

            <p>Pastikan seluruh data yang Anda isi sudah benar sebelum dikirim.</p>
            <p>Setelah data dikirim, sistem akan membuat nomor pendaftaran otomatis.</p>

            <label>
                <input type="checkbox" required>
                Saya menyatakan bahwa data yang saya isi adalah benar.
            </label>

            <br><br>

            <button type="button" class="btn-prev" onclick="nextStep(3)">Previous</button>
            <button type="submit" class="btn-next">Finish</button>
        </div>

    </form>
</div>

<script>
    function nextStep(step) {
        document.querySelectorAll('.step').forEach(function(el) {
            el.classList.remove('active');
        });

        document.querySelectorAll('.step-tab').forEach(function(el) {
            el.classList.remove('active');
        });

        document.getElementById('step' + step).classList.add('active');
        document.getElementById('tab' + step).classList.add('active');
    }
</script>

@endsection