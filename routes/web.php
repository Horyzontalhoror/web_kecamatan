<?php

use Illuminate\Support\Facades\Route;

// Controller untuk Halaman Publik
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PublicBeritaController;
use App\Http\Controllers\PublicDownloadController;
use App\Http\Controllers\PublicSuratController;

// Controller untuk Panel Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\ArsipController;
use App\Http\Controllers\Admin\AktivitasPegawaiController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DownloadController;

// Livewire Components
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

## HALAMAN PUBLIK
// Route untuk Halaman Publik
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Halaman Statis
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Halaman Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

// Halaman Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Halaman Surat Online
Route::get('/surat-online', [PublicSuratController::class, 'create'])->name('suratonline.create');
Route::post('/surat-online', [PublicSuratController::class, 'store'])->name('suratonline.store');

// Halaman Berita Kegiatan
Route::get('/berita-kegiatan', [PublicBeritaController::class, 'index'])->name('beritakegiatan');

// Halaman Unduhan
Route::get('/unduhan', [PublicDownloadController::class, 'index'])->name('unduhan');

// Halaman Organisasi (Organizational Chart)
Route::view('/organisasi', 'pages.component.organisasi')->name('orgchart');


## PANEL ADMIN (Dilindungi Middleware Auth)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dokumen
    Route::get('/dokumen/{dokumen}/view', [DokumenController::class, 'view'])->name('dokumen.view');
    Route::resource('dokumen', DokumenController::class)->except(['create', 'show', 'edit', 'update']);

    // Arsip
    Route::get('/arsip/{arsip}/view', [ArsipController::class, 'view'])->name('arsip.view');
    Route::resource('arsip', ArsipController::class)->except(['create', 'show', 'edit', 'update']);

    // Aktivitas Pegawai
    Route::resource('aktivitas-pegawai', AktivitasPegawaiController::class)->except(['show']);

    // Surat (Custom actions)
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::patch('/surat/{surat}/update-status', [SuratController::class, 'updateStatus'])->name('surat.updateStatus');
    Route::patch('/surat/{surat}/reject', [SuratController::class, 'reject'])->name('surat.reject');
    Route::get('/surat/{surat}/generate-pdf', [SuratController::class, 'generatePdf'])->name('surat.generatePdf');
    Route::get('/surat/{surat}', [SuratController::class, 'show'])->name('surat.show');
    Route::delete('/surat/{surat}', [SuratController::class, 'destroy'])->name('surat.destroy');

    // Berita
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita'])->except(['show']);
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

    // Download
    Route::resource('download', DownloadController::class)->except(['show']);

    // Halaman Info Tambahan
    Route::get('/admin/informasih', function () {
        return view('admin.informasih.index');
    }) ->name('informasih.index');

    // Halaman Layanan Publik
    Route::get('/admin/layananpublik', function () {
        return view('admin.layananpublik.index');
    }) ->name('layananpublik.index');

    // Settings
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


## ROUTE OTENTIKASI
require __DIR__ . '/auth.php';
