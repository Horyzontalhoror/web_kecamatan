@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12">
    <div class="max-w-screen-xl px-6 mx-auto space-y-12">

        {{-- Judul --}}
        <div class="text-center lg:text-left">
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-2">
                📰 Berita & Kegiatan
            </h2>
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                Artikel, dokumentasi, dan informasi kegiatan desa/kecamatan.
            </p>
        </div>

        {{-- Daftar Berita / Artikel --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Card 1 --}}
            <div class="group bg-white dark:bg-neutral-900 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-3 gap-2">
                    <span class="text-2xl">🔔</span>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 transition">
                        Sosialisasi Layanan Digital
                    </h3>
                </div>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                    Kecamatan Tanjung Bumi meluncurkan layanan surat online untuk mempermudah masyarakat.
                </p>
                <div class="text-xs text-gray-500 dark:text-gray-400">
                    📅 Diposting: 20 Juni 2025
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="group bg-white dark:bg-neutral-900 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-3 gap-2">
                    <span class="text-2xl">📷</span>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 transition">
                        Dokumentasi Kerja Bakti
                    </h3>
                </div>
                <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                    Warga bersama perangkat desa membersihkan area balai desa dalam rangka menyambut Hari Kemerdekaan.
                </p>
                <div class="text-xs text-gray-500 dark:text-gray-400">
                    📅 Diposting: 17 Juni 2025
                </div>
            </div>
        </div>

        {{-- Info Tambahan --}}
        <div class="text-sm text-gray-600 dark:text-gray-400 text-center md:text-left pt-4">
            📌 Semua berita dan dokumentasi kegiatan desa akan diperbarui secara berkala.
        </div>
    </div>
</section>
@endsection
