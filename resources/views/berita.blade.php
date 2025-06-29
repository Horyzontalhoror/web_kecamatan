<x-layouts.app :title="'Manajemen Berita'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-yellow-100 text-yellow-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 20H5a2 2 0 01-2-2V7h16v11a2 2 0 01-2 2zM7 10h6M7 14h6M15 10h2a2 2 0 012 2v2a2 2 0 01-2 2h-2V10z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Berita & Kegiatan</h2>
        </div>

        {{-- Form Tambah/Edit --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm space-y-4">
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Judul Berita</label>
                    <input type="text" placeholder="Contoh: Musyawarah Desa Tahunan"
                        class="w-full p-2 text-sm rounded-md border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-gray-800 dark:text-white focus:ring-yellow-500 focus:border-yellow-500" />
                </div>

                {{-- Isi --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Isi Berita</label>
                    <textarea rows="4" placeholder="Isi berita atau kegiatan..."
                        class="w-full p-2 text-sm rounded-md border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-gray-800 dark:text-white focus:ring-yellow-500 focus:border-yellow-500"></textarea>
                </div>

                {{-- Upload Foto --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-neutral-200">Foto Dokumentasi (opsional)</label>
                    <input type="file" accept="image/*"
                        class="w-full p-1 text-sm rounded-md border border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 text-gray-800 dark:text-white" />
                </div>

                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Berita
                </button>
            </form>
        </div>

        {{-- Daftar Berita (Placeholder) --}}
        <div class="grid md:grid-cols-2 gap-4">
            <div class="p-4 border rounded-xl bg-white dark:bg-neutral-900 shadow-sm">
                <h3 class="font-semibold text-gray-800 dark:text-white">🎉 Hari Jadi Kecamatan</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Peringatan ke-57 tahun dengan berbagai kegiatan.</p>
                <div class="flex gap-2">
                    <button class="text-sm text-yellow-600 hover:underline">Edit</button>
                    <button class="text-sm text-red-600 hover:underline">Hapus</button>
                </div>
            </div>
            <div class="p-4 border rounded-xl bg-white dark:bg-neutral-900 shadow-sm">
                <h3 class="font-semibold text-gray-800 dark:text-white">🧹 Bersih Desa</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Kegiatan gotong royong di lingkungan pasar.</p>
                <div class="flex gap-2">
                    <button class="text-sm text-yellow-600 hover:underline">Edit</button>
                    <button class="text-sm text-red-600 hover:underline">Hapus</button>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
