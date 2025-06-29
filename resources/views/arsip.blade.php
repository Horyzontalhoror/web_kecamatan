<x-layouts.app :title="'Arsip'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-green-100 text-green-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4h16v4H4V4zm0 6h16v10H4V10z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Digitalisasi Arsip</h2>
        </div>

        {{-- Form Upload Arsip --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Upload Arsip (PDF / JPG / PNG)
                    </label>
                    <input type="file" accept=".pdf,.jpg,.jpeg,.png"
                           class="block w-full rounded-md border border-gray-300 dark:border-neutral-600 shadow-sm focus:ring-green-500 focus:border-green-500 text-sm bg-white dark:bg-neutral-800 text-gray-700 dark:text-white" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                            Kategori Surat
                        </label>
                        <select class="w-full rounded border border-gray-300 dark:border-neutral-600 p-2 text-sm bg-white dark:bg-neutral-800 text-gray-700 dark:text-white">
                            <option>Surat Masuk</option>
                            <option>Surat Keluar</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                            Tanggal Arsip
                        </label>
                        <input type="date"
                               class="w-full rounded border border-gray-300 dark:border-neutral-600 p-2 text-sm bg-white dark:bg-neutral-800 text-gray-700 dark:text-white" />
                    </div>
                </div>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a1 1 0 001 1h14a1 1 0 001-1v-1M4 12l8-8 8 8" />
                    </svg>
                    Upload Arsip
                </button>
            </form>
        </div>

        {{-- Form Pencarian Arsip --}}
        <div class="space-y-2">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📁 Pencarian Arsip</h3>
            <form class="flex items-center gap-2">
                <input type="text" placeholder="Cari berdasarkan nama/kategori"
                       class="flex-1 rounded border border-gray-300 dark:border-neutral-600 p-2 text-sm bg-white dark:bg-neutral-800 text-gray-700 dark:text-white" />
                <button type="submit"
                        class="px-4 py-2 bg-gray-700 text-white text-sm rounded hover:bg-gray-800">
                    Cari
                </button>
            </form>
        </div>

        {{-- Daftar Arsip Dummy --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 border rounded bg-white dark:bg-neutral-800 dark:border-neutral-700">
                <p class="font-medium text-gray-800 dark:text-white">Surat_Masuk_01.pdf</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kategori: Surat Masuk • 2024-11-20</p>
                <a href="#" class="text-sm text-green-600 underline">Unduh</a>
            </div>
            <div class="p-4 border rounded bg-white dark:bg-neutral-800 dark:border-neutral-700">
                <p class="font-medium text-gray-800 dark:text-white">Surat_Keluar_02.jpg</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kategori: Surat Keluar • 2024-10-05</p>
                <a href="#" class="text-sm text-green-600 underline">Unduh</a>
            </div>
        </div>

        {{-- Info Backup --}}
        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7" />
            </svg>
            Backup otomatis tersedia untuk semua arsip yang diunggah.
        </div>

    </div>
</x-layouts.app>
