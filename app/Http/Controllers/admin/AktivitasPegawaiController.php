<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AktivitasPegawai;
use Illuminate\Http\Request;

class AktivitasPegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = AktivitasPegawai::query();
        if ($request->search) {
            $query->where('nama_pegawai', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }
        $aktivitasPegawais = $query->latest()->paginate(10);
        return view('admin.pegawai.index', compact('aktivitasPegawais'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'tanggal_aktivitas' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        AktivitasPegawai::create($validated);
        return back()->with('success', 'Aktivitas berhasil disimpan.');
    }

    public function edit(AktivitasPegawai $aktivitasPegawai)
    {
        return view('admin.pegawai.edit', ['aktivitas' => $aktivitasPegawai]);
    }

    public function update(Request $request, AktivitasPegawai $aktivitasPegawai)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'tanggal_aktivitas' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        $aktivitasPegawai->update($validated);
        return redirect()->route('aktivitas-pegawai.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy(AktivitasPegawai $aktivitasPegawai)
    {
        $aktivitasPegawai->delete();
        return back()->with('success', 'Aktivitas berhasil dihapus.');
    }
}
