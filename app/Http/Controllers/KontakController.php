<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class KontakController extends Controller
{
    public function index(): View
    {
        return view('pages.kontak');
    }
}
