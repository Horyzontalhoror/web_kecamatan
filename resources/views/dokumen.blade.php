<x-layouts.app :title="'Dokumen'">
    <div class="space-y-6">

        {{-- Judul --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-100 text-blue-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m2 4H7m5-12l-5.447 2.724A2 2 0 006 8.618v6.764a2 2 0 001.553 1.894L12 20l5.447-2.724A2 2 0 0018 15.382V8.618a2 2 0 00-1.553-1.894L12 4z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Manajemen Dokumen</h2>
        </div>

        {{-- Form Upload Dokumen --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Unggah Dokumen (PDF / DOCX)
                    </label>
                    <input type="file" name="dokumen" accept=".pdf,.doc,.docx" required
                           class="block w-full rounded-md border border-gray-300 dark:border-neutral-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-700 dark:text-neutral-200 bg-white dark:bg-neutral-800" />
                </div>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a1 1 0 001 1h14a1 1 0 001-1v-1M4 12l8-8 8 8" />
                    </svg>
                    Upload Dokumen
                </button>
            </form>
        </div>

        {{-- Daftar Dokumen --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-900 shadow-sm">
                <p class="font-medium text-gray-800 dark:text-white">📄 Contoh_Dokumen_1.pdf</p>
                <a href="#" target="_blank" class="text-sm text-blue-600 underline">Lihat Dokumen</a>
            </div>
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-900 shadow-sm">
                <p class="font-medium text-gray-800 dark:text-white">📄 Contoh_Dokumen_2.docx</p>
                <a href="#" target="_blank" class="text-sm text-blue-600 underline">Lihat Dokumen</a>
            </div>
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-900 shadow-sm">
                <p class="font-medium text-gray-800 dark:text-white">📄 Contoh_Dokumen_3.pdf</p>
                <a href="#" target="_blank" class="text-sm text-blue-600 underline">Lihat Dokumen</a>
            </div>
        </div>

    </div>
</x-layouts.app>
