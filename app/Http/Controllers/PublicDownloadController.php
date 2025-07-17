<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class PublicDownloadController extends Controller
{
    public function index()
    {
        // Ambil semua data unduhan, urutkan dari yang terbaru, dan tampilkan 9 per halaman
        $downloads = Download::latest()->paginate(9);

        return view('pages.unduhan', compact('downloads'));
    }
}
