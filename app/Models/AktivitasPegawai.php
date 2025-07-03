<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasPegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pegawai',
        'tanggal_aktivitas',
        'deskripsi',
    ];

    protected $casts = [
        'tanggal_aktivitas' => 'date',
    ];
}
