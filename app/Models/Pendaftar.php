<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $fillable = [
    'nomor_pendaftaran',

    'judul_naskah',
    'kategori_naskah',
    'abstrak',
    'instansi',

    'jenis_pendaftar',
    'formasi_id',
    'nik',
    'nama',
    'tempat_lahir',
    'tanggal_lahir',
    'jenis_kelamin',
    'alamat',
    'no_hp',
    'email',
    'ktp',
    'ijazah',
    'pas_foto',
    'file_pendukung',
    'status_verifikasi',
    'status_seleksi',
    'catatan',
];
}