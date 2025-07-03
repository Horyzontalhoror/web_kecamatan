<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::latest()->paginate(10);
        return view('admin.download.index', compact('downloads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file_download' => 'required|file|mimes:pdf,doc,docx,zip|max:10240', // Maks 10MB
        ]);

        $path = $request->file('file_download')->store('downloads', 'public');

        Download::create([
            'judul' => $validated['judul'],
            'path' => $path,
        ]);

        return back()->with('success', 'File berhasil diunggah.');
    }

    public function edit(Download $download)
    {
        return view('admin.download.edit', compact('download'));
    }

    public function update(Request $request, Download $download)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file_download' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
        ]);

        if ($request->hasFile('file_download')) {
            // Hapus file lama
            Storage::disk('public')->delete($download->path);
            // Simpan file baru
            $path = $request->file('file_download')->store('downloads', 'public');
            $download->path = $path;
        }

        $download->judul = $validated['judul'];
        $download->save();

        return redirect()->route('download.index')->with('success', 'File berhasil diperbarui.');
    }

    public function destroy(Download $download)
    {
        Storage::disk('public')->delete($download->path);
        $download->delete();
        return back()->with('success', 'File berhasil dihapus.');
    }
}
