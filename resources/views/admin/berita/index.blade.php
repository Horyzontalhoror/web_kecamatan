<x-layouts.app :title="'Manajemen Berita'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-yellow-100 text-yellow-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V7h16v11a2 2 0 01-2 2zM7 10h6M7 14h6M15 10h2a2 2 0 012 2v2a2 2 0 01-2 2h-2V10z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Berita & Kegiatan</h2>
        </div>

        {{-- Form Tambah Berita --}}
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 ...">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 ...">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="judul" class="block text-sm font-medium">Judul Berita</label>
                    <input type="text" name="judul" id="judul" required class="w-full ...">
                </div>
                <div>
                    <label for="isi" class="block text-sm font-medium">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="4" required class="w-full ..."></textarea>
                </div>
                <div>
                    <label for="foto" class="block text-sm font-medium">Foto Dokumentasi</label>
                    <input type="file" name="foto" id="foto" accept="image/*" class="w-full ...">
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>

                    Simpan Berita
                </button>
            </form>
        </div>

        {{-- Daftar Berita --}}
        <div class="grid md:grid-cols-2 gap-4">
            @forelse ($beritas as $item)
                <div class="p-4 border rounded-xl bg-white dark:bg-neutral-900 shadow-sm">
                    @if ($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}"
                            class="w-full h-32 object-cover rounded-md mb-2">
                    @endif
                    <h3 class="font-semibold">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ Str::limit($item->isi, 100) }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('berita.edit', $item) }}"
                            class="text-sm text-yellow-600 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('berita.destroy', $item) }}"
                            onsubmit="return confirm('Yakin hapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="md:col-span-2 text-center text-gray-500">Belum ada berita.</p>
            @endforelse
        </div>

        {{-- Paginasi --}}
        <div class="mt-4">{{ $beritas->links() }}</div>
    </div>
</x-layouts.app>
