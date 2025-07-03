<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_file',
        'path',
        'kategori',
        'tanggal_arsip',
    ];

    protected $casts = [
        'tanggal_arsip' => 'date', // Otomatis mengubah string jadi objek tanggal
    ];
}
