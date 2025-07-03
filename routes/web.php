<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\ArsipController;
use App\Http\Controllers\Admin\AktivitasPegawaiController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DownloadController;

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
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::get('dokumen', function () {
    //     return view('dokumen');
    // })->name('dokumen');
    // Route untuk menampilkan halaman & daftar dokumen
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::delete('/dokumen/{dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
    Route::get('/dokumen/{dokumen}/view', [DokumenController::class, 'view'])->name('dokumen.view');

    // Route::get('arsip', function () {
    //     return view('arsip');
    // })->name('arsip');
    // --- ARSIP ROUTES ---
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
    Route::get('/arsip/{arsip}/view', [ArsipController::class, 'view'])->name('arsip.view');
    Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('arsip.destroy');

    // Route::get('pegawai', function () {
    //     return view('pegawai');
    // })->name('pegawai');
    // --- AKTIVITAS PEGAWAI ROUTE ---
    Route::resource('aktivitas-pegawai', AktivitasPegawaiController::class)->except(['show']);

    // Route::get('surat', function () {
    //     return view('surat');
    // })->name('surat');
    // --- SURAT ROUTES ---
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::patch('/surat/{surat}/update-status', [SuratController::class, 'updateStatus'])->name('surat.updateStatus');
    Route::patch('/surat/{surat}/reject', [SuratController::class, 'reject'])->name('surat.reject'); // TAMBAHKAN INI
    Route::get('/surat/{surat}/generate-pdf', [SuratController::class, 'generatePdf'])->name('surat.generatePdf');

    // Route::get('berita', function () {
    //     return view('berita');
    // })->name('berita');
    // --- BERITA ROUTE ---
    Route::resource('berita', BeritaController::class)
        ->except(['show'])
        ->parameters(['berita' => 'berita']);

    Route::get('informasi', function () {
        return view('informasi');
    })->name('informasi');
    Route::get('layananpublik', function () {
        return view('layananpublik');
    })->name('layananpublik');

    // Route::get('download', function () {
    //     return view('download');
    // })->name('download');
    // --- DOWNLOAD ROUTE ---
    Route::resource('download', DownloadController::class)->except(['show']);


    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
