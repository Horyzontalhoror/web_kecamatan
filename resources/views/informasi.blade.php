<x-layouts.app :title="'Informasi'">
    <div class="space-y-6">

        {{-- Judul --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-yellow-100 text-yellow-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Profil & Informasi Kecamatan</h2>
        </div>

        {{-- Konten Informasi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Card 1 --}}
            <div class="p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📜 Sejarah & Visi Misi</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Informasi tentang pembentukan, visi, misi, dan nilai dasar kecamatan.
                </p>
            </div>

            {{-- Card 2 --}}
            <div class="p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">👥 Struktur Organisasi</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Tampilan bagan dan posisi perangkat desa atau pegawai.
                </p>
            </div>

            {{-- Card 3 --}}
            <div class="p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">🌿 Potensi Daerah</h3>
                <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400 mt-1">
                    <li>Batik Gentongan</li>
                    <li>UMKM Lokal</li>
                    <li>Kegiatan Keagamaan</li>
                </ul>
            </div>

            {{-- Card 4 --}}
            <div class="p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📰 Berita & Kegiatan</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Update rutin publikasi kegiatan atau pengumuman resmi.
                </p>
            </div>
        </div>

    </div>
</x-layouts.app>
