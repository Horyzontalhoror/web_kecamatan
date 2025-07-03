<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'jenis_surat',
        'status',
        'nomor_surat',
        'keterangan',
        'path_pdf'
    ];
}
