<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewHistory extends Model
{
    protected $fillable = [
        'pendaftar_id',
        'status_verifikasi',
        'status_seleksi',
        'catatan',
        'reviewer'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}