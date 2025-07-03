<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    // Menampilkan halaman dan daftar dokumen
    public function index()
    {
        $dokumen = Dokumen::latest()->get();
        return view('admin.dokumen.index', ['dokumen' => $dokumen]);
    }

    // Menyimpan dokumen yang baru diunggah
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:5120', // maks 5MB
        ]);

        // 2. Simpan file ke storage
        $file = $request->file('dokumen');
        $path = $file->store('dokumen', 'public'); // Simpan di storage/app/public/dokumen

        // 3. Simpan info file ke database
        Dokumen::create([
            'nama_file' => $file->getClientOriginalName(),
            'path' => $path,
        ]);

        // 4. Kembali dengan pesan sukses
        return back()->with('success', 'Dokumen berhasil diunggah!');
    }

    public function view(Dokumen $dokumen)
    {
        // Kirim path file ke view baru
        return view('admin.dokumen.view', ['path' => $dokumen->path]);
    }

    // Menghapus dokumen
    public function destroy(Dokumen $dokumen)
    {
        // 1. Hapus file fisik dari storage
        Storage::disk('public')->delete($dokumen->path);

        // 2. Hapus record dari database
        $dokumen->delete();

        // 3. Redirect kembali dengan pesan sukses
        return back()->with('success', 'Dokumen berhasil dihapus!');
    }
}
