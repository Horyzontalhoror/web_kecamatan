<x-layouts.app :title="'Download'">
    <div class="space-y-6">

        {{-- Judul --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-sky-100 text-sky-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a1 1 0 001 1h14a1 1 0 001-1v-1M12 4v12m0 0l-4-4m4 4l4-4" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Download Center</h2>
        </div>

        {{-- Form Upload File Baru --}}
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 ...">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 ...">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('download.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="judul" class="block text-sm font-medium ...">Nama File (Judul Tampilan)</label>
                    <input type="text" name="judul" id="judul" required class="w-full ...">
                </div>
                <div>
                    <label for="file_download" class="block text-sm font-medium ...">Pilih File (PDF/DOC/ZIP)</label>
                    <input type="file" name="file_download" id="file_download" required class="w-full ...">
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-sky-600 text-white text-sm font-medium rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>

                    Upload File
                </button>
            </form>
        </div>

        {{-- Daftar Dokumen --}}
        <div class="space-y-3">
            @forelse ($downloads as $file)
                <div class="flex items-center justify-between p-4 rounded-xl border ... bg-white dark:bg-neutral-900">
                    {{-- Link Download untuk Publik --}}
                    <a href="{{ Storage::url($file->path) }}" download class="flex-1">
                        <span class="text-sm font-medium ...">📄 {{ $file->judul }}</span>
                    </a>
                    {{-- Tombol Aksi untuk Admin --}}
                    <div class="flex items-center gap-2 ml-4">
                        <a href="{{ route('download.edit', $file) }}"
                            class="text-xs text-yellow-600 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('download.destroy', $file) }}"
                            onsubmit="return confirm('Yakin hapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">Belum ada file yang diunggah.</p>
            @endforelse
        </div>

        {{-- Paginasi --}}
        <div class="mt-4">{{ $downloads->links() }}</div>
    </div>
</x-layouts.app>
