<x-layouts.app :title="'Pegawai'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-100 text-indigo-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 9l3 3-3 3m5 0h3m-3-6h3m4 3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Pencatatan Aktivitas Pegawai
            </h2>
        </div>

        {{-- Form Input Aktivitas --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Nama Pegawai
                    </label>
                    <input type="text"
                           placeholder="Masukkan nama lengkap"
                           class="w-full border rounded-md p-2 text-sm text-gray-800 dark:text-white bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600 focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Tanggal Aktivitas
                    </label>
                    <input type="date"
                           class="w-full border rounded-md p-2 text-sm text-gray-800 dark:text-white bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600 focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Deskripsi Aktivitas
                    </label>
                    <textarea rows="3" placeholder="Contoh: Rapat koordinasi, pelayanan masyarakat..."
                              class="w-full border rounded-md p-2 text-sm text-gray-800 dark:text-white bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Aktivitas
                </button>
            </form>
        </div>

        {{-- Informasi Tambahan --}}
        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            Laporan dapat ditinjau oleh atasan dan diekspor dalam format PDF untuk keperluan evaluasi.
        </div>

    </div>
</x-layouts.app>
