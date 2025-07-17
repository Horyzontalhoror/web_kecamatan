<x-layouts.app :title="'Profil & Informasi'">
    <div class="space-y-8">

        {{-- Header --}}
        <div class="flex items-center gap-3">
            {{-- A more fitting icon for a profile/building --}}
            <div class="p-2 bg-yellow-100 text-yellow-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Profil & Informasi Kecamatan</h2>
        </div>

        {{-- Konten Informasi with a more dynamic layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Featured Card: Sejarah & Visi Misi (Spanning 2 columns on large screens) --}}
            <a href="#" class="group block lg:col-span-2 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 p-3 bg-yellow-50 dark:bg-yellow-900/50 text-yellow-600 dark:text-yellow-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📜 Sejarah & Visi Misi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Jelajahi informasi tentang pembentukan, visi, misi, dan nilai-nilai yang menjadi landasan kecamatan kami.
                        </p>
                    </div>
                </div>
            </a>

            {{-- Card: Berita & Kegiatan --}}
             <a href="#" class="group block rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 p-3 bg-green-50 dark:bg-green-900/50 text-green-600 dark:text-green-400 rounded-lg">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3h2m-4 3h2m-4 3h2m-4 3h2" /></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📰 Berita & Kegiatan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                           Update terbaru kegiatan dan pengumuman resmi dari kecamatan.
                        </p>
                    </div>
                </div>
            </a>

            {{-- Card: Struktur Organisasi --}}
            <a href="#" class="group block rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                 <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 p-3 bg-sky-50 dark:bg-sky-900/50 text-sky-600 dark:text-sky-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">👥 Struktur Organisasi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Lihat bagan organisasi dan kenali para perangkat kecamatan.
                        </p>
                    </div>
                </div>
            </a>

            {{-- Card: Potensi Daerah (using tags/pills) --}}
            <div class="lg:col-span-2 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">🌿 Potensi Daerah</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 mb-4">
                    Temukan keunikan dan produk unggulan yang menjadi kebanggaan daerah kami.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 text-xs font-medium text-purple-800 bg-purple-100 dark:bg-purple-900/50 dark:text-purple-300 rounded-full">Batik Gentongan</span>
                    <span class="px-3 py-1 text-xs font-medium text-indigo-800 bg-indigo-100 dark:bg-indigo-900/50 dark:text-indigo-300 rounded-full">UMKM Kuliner</span>
                    <span class="px-3 py-1 text-xs font-medium text-teal-800 bg-teal-100 dark:bg-teal-900/50 dark:text-teal-300 rounded-full">Kerajinan Tangan</span>
                    <span class="px-3 py-1 text-xs font-medium text-rose-800 bg-rose-100 dark:bg-rose-900/50 dark:text-rose-300 rounded-full">Wisata Religi</span>
                    <span class="px-3 py-1 text-xs font-medium text-gray-800 bg-gray-100 dark:bg-gray-700 dark:text-gray-300 rounded-full">Pertanian</span>
                </div>
            </div>

        </div>

    </div>
</x-layouts.app>
