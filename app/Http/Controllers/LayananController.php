<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LayananController extends Controller
{
    public function index(): View
    {
        return view('pages.layanan');
    }
}
