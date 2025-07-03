<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::latest()->paginate(10);
        return view('admin.surat.index', compact('surats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_surat' => ['required', Rule::in(config('kantor.jenis_surat'))],
        ]);

        Surat::create($validated);
        return back()->with('success', 'Permohonan surat berhasil dikirim.');
    }

    public function updateStatus(Request $request, Surat $surat)
    {
        // 1. Generate Nomor Surat (jika belum ada)
        if (!$surat->nomor_surat) {
            $surat->update(['nomor_surat' => $this->generateNomorSurat($surat)]);
        }

        // 2. Update status menjadi Selesai
        $surat->update(['status' => 'Selesai']);

        return back()->with('success', 'Status surat telah diperbarui.');
    }

    public function reject(Request $request, Surat $surat)
    {
        $request->validate(['keterangan' => 'required|string']);
        $surat->update([
            'status' => 'Ditolak',
            'keterangan' => $request->keterangan,
        ]);
        return back()->with('success', 'Permohonan surat telah ditolak.');
    }

    public function generatePdf(Surat $surat)
    {
        // Generate nomor surat jika belum ada
        if (!$surat->nomor_surat) {
            $surat->nomor_surat = $this->generateNomorSurat($surat);
            $surat->save();
        }

        $pdf = Pdf::loadView('admin.surat.pdf_template', compact('surat'));
        $filename = 'surat-' . Str::slug($surat->jenis_surat) . '-' . Str::slug($surat->nama_lengkap) . '.pdf';
        $path = 'surat-warga/' . $filename;
        Storage::disk('public')->put($path, $pdf->output());

        $surat->update(['path_pdf' => $path]);
        return $pdf->download($filename);
    }

    // Fungsi untuk membuat nomor surat otomatis
    private function generateNomorSurat(Surat $surat)
    {
        $bulanRomawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $bulan = $bulanRomawi[date('n') - 1];
        $tahun = date('Y');
        $nomorUrut = str_pad($surat->id, 3, '0', STR_PAD_LEFT); // Nomor urut berdasarkan ID

        // Contoh Format: 001/SKU/VII/2025
        return $nomorUrut . '/SK-' . strtoupper(substr($surat->jenis_surat, 17, 3)) . '/' . $bulan . '/' . $tahun;
    }
}
