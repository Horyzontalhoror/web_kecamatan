<x-layouts.app :title="'Download'">
    <div class="space-y-6">

        {{-- Judul --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-sky-100 text-sky-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v1a1 1 0 001 1h14a1 1 0 001-1v-1M12 4v12m0 0l-4-4m4 4l4-4" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Download Center</h2>
        </div>

        {{-- Form Upload File Baru --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Nama File (Judul Tampilan)
                    </label>
                    <input type="text" placeholder="Contoh: Pedoman Pelayanan Desa"
                           class="w-full p-2 text-sm rounded-md border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-gray-800 dark:text-white focus:ring-sky-500 focus:border-sky-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Pilih File (PDF/DOC/ZIP)
                    </label>
                    <input type="file" accept=".pdf,.doc,.docx,.zip"
                           class="w-full p-1 text-sm rounded-md border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-gray-800 dark:text-white" />
                </div>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-sky-600 text-white text-sm font-medium rounded hover:bg-sky-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Upload File ke Halaman Publik
                </button>
            </form>
        </div>

        {{-- Daftar Dokumen --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="#" class="flex items-center justify-between p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:bg-sky-50 dark:hover:bg-neutral-800 transition">
                <span class="text-sm font-medium text-gray-800 dark:text-white">📄 Formulir Permohonan Surat</span>
                <span class="text-xs text-sky-600">Download</span>
            </a>
            <a href="#" class="flex items-center justify-between p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:bg-sky-50 dark:hover:bg-neutral-800 transition">
                <span class="text-sm font-medium text-gray-800 dark:text-white">📘 Pedoman Pelayanan Masyarakat</span>
                <span class="text-xs text-sky-600">Download</span>
            </a>
            <a href="#" class="flex items-center justify-between p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:bg-sky-50 dark:hover:bg-neutral-800 transition">
                <span class="text-sm font-medium text-gray-800 dark:text-white">📊 Laporan Dana Desa</span>
                <span class="text-xs text-sky-600">Download</span>
            </a>
            <a href="#" class="flex items-center justify-between p-4 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm hover:bg-sky-50 dark:hover:bg-neutral-800 transition">
                <span class="text-sm font-medium text-gray-800 dark:text-white">📜 Peraturan Desa Terkini</span>
                <span class="text-xs text-sky-600">Download</span>
            </a>
        </div>

    </div>
</x-layouts.app>
