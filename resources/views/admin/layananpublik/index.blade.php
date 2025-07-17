<x-layouts.app :title="'Layanan'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-yellow-100 text-yellow-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 12H8m0 0l4-4m-4 4l4 4M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Pengajuan Layanan Publik</h2>
        </div>

        {{-- Form Pengajuan --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Nama Lengkap
                    </label>
                    <input type="text" placeholder="Masukkan nama lengkap"
                           class="w-full border rounded-md p-2 text-sm text-gray-800 dark:text-white bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600 focus:ring-yellow-500 focus:border-yellow-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Jenis Layanan
                    </label>
                    <input type="text" placeholder="Contoh: Surat Domisili, Keterangan Usaha"
                           class="w-full border rounded-md p-2 text-sm text-gray-800 dark:text-white bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600 focus:ring-yellow-500 focus:border-yellow-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Keterangan Tambahan
                    </label>
                    <textarea rows="3" placeholder="Masukkan informasi tambahan (opsional)"
                              class="w-full border rounded-md p-2 text-sm text-gray-800 dark:text-white bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600 focus:ring-yellow-500 focus:border-yellow-500"></textarea>
                </div>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded hover:bg-yellow-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v16h16V4H4zm4 4h8v2H8V8zm0 4h5v2H8v-2z" />
                    </svg>
                    Ajukan Permohonan
                </button>
            </form>
        </div>

        {{-- Catatan --}}
        <p class="text-sm text-gray-600 dark:text-gray-400 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            Notifikasi status akan dikirim via email atau ditampilkan di dashboard.
        </p>

    </div>
</x-layouts.app>
