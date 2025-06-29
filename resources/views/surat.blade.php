<x-layouts.app :title="'Surat'">
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-100 text-blue-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-3-3v6m5 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v10a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Manajemen Surat Online</h2>
        </div>

        {{-- Form Input --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            <form class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">Nama Lengkap</label>
                    <input type="text" class="w-full rounded border p-2 text-sm bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600" placeholder="Nama Warga">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">Alamat</label>
                    <input type="text" class="w-full rounded border p-2 text-sm bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600" placeholder="Alamat Domisili">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">Jenis Surat</label>
                    <input type="text" class="w-full rounded border p-2 text-sm bg-white dark:bg-neutral-800 border-gray-300 dark:border-neutral-600" placeholder="Usaha, Domisili, Keterangan, dll">
                </div>
                <div class="md:col-span-2">
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        Kirim Permohonan
                    </button>
                </div>
            </form>
        </div>

        {{-- Tabel Permohonan --}}
        <div class="space-y-2">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📑 Daftar Permohonan Surat</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 text-sm">
                    <thead class="bg-gray-50 dark:bg-neutral-800">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-white">Nama</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-white">Jenis Surat</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-white">Status</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-gray-100 dark:divide-neutral-700">
                        <tr>
                            <td class="px-4 py-2">Rina Ayu</td>
                            <td class="px-4 py-2">Surat Domisili</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Diproses</span>
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <button class="px-3 py-1 text-xs text-white bg-green-600 rounded hover:bg-green-700">Selesai</button>
                                <button class="px-3 py-1 text-xs text-white bg-indigo-600 rounded hover:bg-indigo-700">Generate PDF</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">Budi Santoso</td>
                            <td class="px-4 py-2">Surat Usaha</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Selesai</span>
                            </td>
                            <td class="px-4 py-2 space-x-2">
                                <button class="px-3 py-1 text-xs text-white bg-indigo-600 rounded hover:bg-indigo-700">Lihat PDF</button>
                            </td>
                        </tr>
                        {{-- Tambahkan baris dummy lain bila perlu --}}
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Informasi Tambahan --}}
        <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            Gunakan aksi di tabel untuk memverifikasi dan mencetak surat warga.
        </div>

    </div>
</x-layouts.app>
