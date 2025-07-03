<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    // Menampilkan halaman arsip & menangani pencarian
    public function index(Request $request)
    {
        $query = Arsip::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_file', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
        }

        $arsips = $query->latest()->paginate(10); // Menampilkan 10 arsip per halaman

        return view('admin.arsip.index', compact('arsips'));
    }

    // Menyimpan arsip baru
    public function store(Request $request)
    {
        $request->validate([
            'file_arsip' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // Maks 5MB
            'kategori' => 'required|string|in:Surat Masuk,Surat Keluar',
            'tanggal_arsip' => 'required|date',
        ]);

        $file = $request->file('file_arsip');
        $path = $file->store('arsip', 'public');

        Arsip::create([
            'nama_file' => $file->getClientOriginalName(),
            'path' => $path,
            'kategori' => $request->kategori,
            'tanggal_arsip' => $request->tanggal_arsip,
        ]);

        return back()->with('success', 'Arsip berhasil diunggah!');
    }

    // Menampilkan arsip dalam viewer
    public function view(Arsip $arsip)
    {
        return view('admin.arsip.view', ['path' => $arsip->path]);
    }

    // Menghapus arsip
    public function destroy(Arsip $arsip)
    {
        Storage::disk('public')->delete($arsip->path);
        $arsip->delete();
        return back()->with('success', 'Arsip berhasil dihapus!');
    }
}
