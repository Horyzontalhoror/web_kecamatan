<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PublicSuratController extends Controller
{
    // Menampilkan halaman form
    public function create()
    {
        return view('pages.suratonline');
    }

    // Menyimpan data pengajuan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:100', // Validasi untuk kolom baru
            'keterangan' => 'nullable|string',    // Validasi untuk kolom baru (boleh kosong)
            'jenis_surat' => ['required', \Illuminate\Validation\Rule::in(config('kantor.jenis_surat'))],
            'dokumen_pendukung' => 'nullable|array',
            'dokumen_pendukung.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $dokumenPaths = [];
        if ($request->hasFile('dokumen_pendukung')) {
            foreach ($request->file('dokumen_pendukung') as $file) {
                $dokumenPaths[] = $file->store('dokumen-pendukung', 'public');
            }
        }

        // Jangan lupa gabungkan path file sebelum create
        $validated['dokumen_pendukung'] = $dokumenPaths;

        $surat = \App\Models\Surat::create($validated);

        return back()->with('success', 'Permohonan berhasil diajukan! Nomor Registrasi Anda adalah: ' . $surat->id);
    }
}
