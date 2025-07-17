<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'kontak',
        'jenis_surat',
        'status',
        'nomor_surat',
        'keterangan',
        'path_pdf',
        'dokumen_pendukung'
    ];

    // Tambahkan juga casts ini untuk kemudahan
    protected $casts = [
        'dokumen_pendukung' => 'array',
    ];
}
