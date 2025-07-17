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
            'kontak' => 'required|string|max:100',
            'keterangan' => 'nullable|string',
            'jenis_surat' => ['required', Rule::in(config('kantor.jenis_surat'))],
        ]);
        $validated['dokumen_pendukung'] = null;

        Surat::create($validated);
        return back()->with('success', 'Permohonan surat berhasil ditambahkan.');
    }

    public function updateStatus(Request $request, Surat $surat)
    {
        $updateData = ['status' => 'Selesai'];

        // Generate Nomor Surat hanya jika belum ada.
        if (!$surat->nomor_surat) {
            $updateData['nomor_surat'] = $this->generateNomorSurat($surat);
        }

        // Satu kali panggilan update ke database.
        $surat->update($updateData);

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
        // Generate nomor surat jika belum ada.
        if (!$surat->nomor_surat) {
            $surat->nomor_surat = $this->generateNomorSurat($surat);
        }

        $pdf = Pdf::loadView('admin.surat.pdf_template', compact('surat'));
        $filename = 'surat-' . Str::slug($surat->jenis_surat) . '-' . Str::slug($surat->nama_lengkap) . '.pdf';
        $path = 'surat-warga/' . $filename;
        Storage::disk('public')->put($path, $pdf->output());

        // Update path PDF dan nomor surat (jika baru dibuat) dalam satu query.
        $surat->path_pdf = $path;
        $surat->save();

        return $pdf->download($filename);
    }

    /**
     * Fungsi untuk membuat nomor surat otomatis yang lebih baik.
     */
    private function generateNomorSurat(Surat $surat): string
    {
        $bulanRomawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $bulan = $bulanRomawi[date('n') - 1];
        $tahun = date('Y');
        $nomorUrut = str_pad($surat->id, 3, '0', STR_PAD_LEFT);

        // Mengambil kode surat dari config, bukan substr(). Lebih aman!
        $kodeSurat = config('kantor.kode_surat')[$surat->jenis_surat] ?? 'KETERANGAN';

        // Format: 001/SKU/VII/2025
        return "{$nomorUrut}/{$kodeSurat}/{$bulan}/{$tahun}";
    }
    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        return view('admin.surat.show', compact('surat'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        // Best practice: Delete the associated file before deleting the record.
        if ($surat->path_pdf && Storage::disk('public')->exists($surat->path_pdf)) {
            Storage::disk('public')->delete($surat->path_pdf);
        }

        // Also delete supporting documents if necessary
        if (is_array($surat->dokumen_pendukung)) {
            foreach ($surat->dokumen_pendukung as $dok) {
                if (Storage::disk('public')->exists($dok)) {
                    Storage::disk('public')->delete($dok);
                }
            }
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Permohonan surat berhasil dihapus.');
    }
}
