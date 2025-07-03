<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arsip;
use App\Models\Berita;
use App\Models\Dokumen;
use App\Models\Surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data statistik
        $totalDokumen = Dokumen::count();
        $totalArsip = Arsip::count();
        $suratDiproses = Surat::where('status', 'Diproses')->count();

        // Mengambil 3 berita terbaru
        $beritaTerbaru = Berita::latest()->take(3)->get();

        // Mengirim semua data ke view
        return view('admin.dashboard.index', compact(
            'totalDokumen',
            'totalArsip',
            'suratDiproses',
            'beritaTerbaru'
        ));
    }
}
