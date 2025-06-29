<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// user
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('suratonline', function () {
    return view('pages.suratonline');
})->name('suratonline');
Route::get('beritakegiatan', function () {
    return view('pages.beritakegiatan');
})->name('beritakegiatan');
Route::get('unduhan', function () {
    return view('pages.unduhan');
})->name('unduhan');

// organisasi chart
Route::get('/orgchart', function () {
    return view('pages.component.organisasi');
})->name('orgchart');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('dokumen', function () {
        return view('dokumen');
    })->name('dokumen');
    Route::get('arsip', function () {
        return view('arsip');
    })->name('arsip');
    Route::get('pegawai', function () {
        return view('pegawai');
    })->name('pegawai');
    Route::get('surat', function () {
        return view('surat');
    })->name('surat');
    Route::get('berita', function () {
        return view('berita');
    })->name('berita');
    Route::get('informasi', function () {
        return view('informasi');
    })->name('informasi');
    Route::get('layananpublik', function () {
        return view('layananpublik');
    })->name('layananpublik');
    Route::get('download', function () {
        return view('download');
    })->name('download');


    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
