<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class PublicBeritaController extends Controller
{
    public function index()
    {
        // Ambil semua berita, urutkan dari yang terbaru, dan tampilkan 6 per halaman
        $beritas = Berita::latest()->paginate(6);

        return view('pages.beritakegiatan', compact('beritas'));
    }
}
