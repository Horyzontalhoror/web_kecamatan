<x-layouts.app :title="'Manajemen Berita'">
    {{-- We use Alpine.js to manage the image preview and delete confirmation modal --}}
    <div x-data="{ isDeleteModalOpen: false, deleteUrl: '' }" class="space-y-8">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-rose-100 text-rose-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3h2m-4 3h2m-4 3h2m-4 3h2" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Berita & Kegiatan</h2>
        </div>

        {{-- Form Tambah Berita (Collapsible for a cleaner interface) --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
            <details class="p-6">
                <summary class="font-semibold text-gray-800 dark:text-white cursor-pointer select-none">
                    Tulis Berita Baru
                </summary>
                <div class="mt-4 pt-4 border-t dark:border-neutral-700">
                    {{-- Notifikasi Sukses --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
                    @endif
                    <form x-data="{ imagePreviewUrl: '' }" method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label for="judul" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Judul Berita</label>
                            <input type="text" name="judul" id="judul" required class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 focus:ring-rose-500 focus:border-rose-500">
                        </div>
                        <div>
                            <label for="isi" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Isi Berita</label>
                            <textarea name="isi" id="isi" rows="5" required class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 focus:ring-rose-500 focus:border-rose-500"></textarea>
                        </div>
                        <div>
                            <label for="foto" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Foto Dokumentasi (Opsional)</label>
                            <input @change="imagePreviewUrl = $event.target.files.length ? URL.createObjectURL($event.target.files[0]) : ''" type="file" name="foto" id="foto" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                            {{-- Image Preview --}}
                            <template x-if="imagePreviewUrl">
                                <div class="mt-4">
                                    <p class="text-sm font-medium mb-1">Pratinjau Gambar:</p>
                                    <img :src="imagePreviewUrl" alt="Image Preview" class="rounded-md w-full max-w-sm h-auto object-cover">
                                </div>
                            </template>
                        </div>
                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-rose-600 text-white text-sm font-medium rounded-md hover:bg-rose-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            Publikasikan Berita
                        </button>
                    </form>
                </div>
            </details>
        </div>

        {{-- Daftar Berita --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($beritas as $item)
                <div class="flex flex-col rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    {{-- Card Image --}}
                    @if ($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-gray-100 dark:bg-neutral-800 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                        </div>
                    @endif

                    {{-- Card Content --}}
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-white">{{ $item->judul }}</h3>
                        <p class="text-xs text-gray-500 dark:text-neutral-400 mt-1 mb-3">
                            Dipublikasikan pada {{ $item->created_at->isoFormat('D MMMM YYYY') }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 flex-grow">{{ Str::limit($item->isi, 120) }}</p>
                    </div>

                    {{-- Card Footer with Actions --}}
                    <div class="border-t dark:border-neutral-700 p-3 bg-gray-50 dark:bg-neutral-800/50 flex items-center justify-end gap-2">
                        <a href="{{ route('berita.show', $item) }}" title="Lihat Detail" class="p-2 text-sky-600 rounded-full hover:bg-sky-100 dark:hover:bg-neutral-700">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </a>
                        <a href="{{ route('berita.edit', $item) }}" title="Edit" class="p-2 text-yellow-600 rounded-full hover:bg-yellow-100 dark:hover:bg-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L13.196 5.196z" /></svg>
                        </a>
                        <button @click="isDeleteModalOpen = true; deleteUrl = '{{ route('berita.destroy', $item) }}'" type="button" title="Hapus" class="p-2 text-red-600 rounded-full hover:bg-red-100 dark:hover:bg-neutral-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>
            @empty
                <p class="md:col-span-2 lg:col-span-3 text-center text-gray-500 py-12">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>

        {{-- Paginasi --}}
        @if ($beritas->hasPages())
            <div class="mt-8">{{ $beritas->links() }}</div>
        @endif

        {{-- Delete Confirmation Modal --}}
        <div x-show="isDeleteModalOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50" style="display: none;">
            <div @click.away="isDeleteModalOpen = false" class="bg-white dark:bg-neutral-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Anda yakin ingin menghapus berita ini secara permanen?</p>
                <form :action="deleteUrl" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" @click="isDeleteModalOpen = false" class="px-4 py-2 text-sm bg-gray-200 rounded-md">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm text-white bg-red-700 rounded-md">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>
