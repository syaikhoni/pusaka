<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formasi extends Model
{
    protected $fillable = [
    'nama_formasi',
    'kuota',
    'lokasi',
    'syarat',
];
}