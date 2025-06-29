<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col gap-6">

        {{-- Hero Banner --}}
        <div class="rounded-xl bg-gradient-to-r from-blue-600 to-blue-400 text-white p-6 shadow-md">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang di Kecamatan Tanjung Bumi</h2>
            <p class="text-sm md:text-base">
                Website resmi pelayanan publik & informasi masyarakat.
                Akses layanan digital tanpa harus datang ke kantor!
            </p>
        </div>

        {{-- Ringkasan Cepat --}}
        <div class="grid md:grid-cols-3 gap-4">
            {{-- Layanan --}}
            <div class="p-5 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-full">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 dark:text-white text-lg">Layanan Publik</h3>
                </div>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>📝 Permohonan Surat Domisili</li>
                    <li>🏠 Surat Keterangan Usaha</li>
                    <li>📄 Cetak Formulir & Dokumen</li>
                </ul>
            </div>

            {{-- Statistik --}}
            <div class="p-5 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2 bg-green-100 text-green-600 rounded-full">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 dark:text-white text-lg">Statistik Desa</h3>
                </div>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>🏘️ 12 Desa Aktif</li>
                    <li>👨‍👩‍👧‍👦 ±17.000 Penduduk</li>
                    <li>💼 135+ UMKM Terdaftar</li>
                </ul>
            </div>

            {{-- Info Wilayah --}}
            <div class="p-5 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-3">
                    <div class="p-2 bg-yellow-100 text-yellow-600 rounded-full">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M12 22a10 10 0 100-20 10 10 0 000 20z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 dark:text-white text-lg">Tentang Wilayah</h3>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Kecamatan pesisir yang kaya akan budaya, terkenal dengan <strong>Batik Gentongan</strong>,
                    hasil laut, dan kerajinan lokal.
                </p>
            </div>
        </div>

        {{-- Panel Informasi Bawah --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">📢 Berita & Pengumuman</h3>
            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                <li>📌 Program Digitalisasi Arsip telah dimulai di seluruh desa.</li>
                <li>📆 Pendaftaran UMKM dibuka hingga akhir bulan ini.</li>
                <li>📢 Rapat Koordinasi Kecamatan akan diselenggarakan hari Senin pukul 09.00 WIB.</li>
            </ul>
        </div>

    </div>
</x-layouts.app>
