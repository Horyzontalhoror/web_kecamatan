<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->judul);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($validated);
        return back()->with('success', 'Berita berhasil dipublikasikan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'remove_foto' => 'nullable|boolean' // Add validation for the checkbox
        ]);

        // Handle the foto update logic
        if ($request->hasFile('foto')) {
            // Delete old photo if it exists
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            // Store new photo
            $validated['foto'] = $request->file('foto')->store('berita-foto', 'public');
        } elseif ($request->input('remove_foto') == 1) { // Check if the "remove" box was ticked
            // Delete old photo
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            // Set foto to null in the database
            $validated['foto'] = null;
        }

        $berita->update($validated);

        return redirect()->route('berita.show', $berita)->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        // Hapus foto dari storage jika ada
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        // The 'berita' model is automatically fetched by Laravel's route-model binding.
        return view('admin.berita.show', compact('berita'));
    }
}
