<x-layouts.app :title="'Download Center'">
    {{-- We use Alpine.js to manage the delete confirmation modal for a consistent UX --}}
    <div x-data="{ isDeleteModalOpen: false, deleteUrl: '' }" class="space-y-8">

        {{-- Header --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-sky-100 text-sky-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a1 1 0 001 1h14a1 1 0 001-1v-1M12 4v12m0 0l-4-4m4 4l4-4" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Download Center</h2>
        </div>

        {{-- Form Upload File Baru (Admin-only, made collapsible) --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
            <details class="p-6">
                <summary class="font-semibold text-gray-800 dark:text-white cursor-pointer select-none">
                    Upload File Baru (Admin)
                </summary>
                <div class="mt-4 pt-4 border-t dark:border-neutral-700">
                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
                    @endif
                    <form method="POST" action="{{ route('download.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label for="judul" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Nama File (Judul Tampilan)</label>
                            <input type="text" name="judul" id="judul" required class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 focus:ring-sky-500 focus:border-sky-500">
                        </div>

                        {{-- Custom File Input for better UX --}}
                        <div x-data="{ filename: '' }">
                             <label for="file_download" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Pilih File (PDF/DOCX/ZIP)</label>
                             <input @change="filename = $event.target.files.length > 0 ? $event.target.files[0].name : ''" type="file" name="file_download" id="file_download" required class="hidden">
                             <div class="flex items-center gap-2">
                                <label for="file_download" class="cursor-pointer inline-flex items-center gap-2 px-3 py-2 bg-gray-100 dark:bg-neutral-800 text-sm font-medium rounded-md border border-gray-300 dark:border-neutral-600 hover:bg-gray-200 dark:hover:bg-neutral-700 transition">
                                    Pilih File
                                </label>
                                <span x-text="filename" x-show="filename !== ''" class="text-sm text-gray-500"></span>
                                <span x-show="filename === ''" class="text-sm text-gray-500">Tidak ada file yang dipilih</span>
                            </div>
                        </div>

                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-sky-600 text-white text-sm font-medium rounded-md hover:bg-sky-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                            Upload File
                        </button>
                    </form>
                </div>
            </details>
        </div>

        {{-- Daftar Dokumen (Card-based layout) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($downloads as $file)
                @php
                    $extension = strtolower(pathinfo($file->path, PATHINFO_EXTENSION));
                @endphp
                <div class="relative flex flex-col justify-between rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm transition-all duration-300 hover:border-sky-500 hover:shadow-lg">
                    <div class="p-6 flex-grow">
                        {{-- File Icon --}}
                        <div class="mb-4 h-10 w-10 flex items-center justify-center rounded-lg
                            @if($extension == 'pdf') bg-red-100 text-red-600
                            @elseif($extension == 'docx' || $extension == 'doc') bg-blue-100 text-blue-600
                            @elseif($extension == 'zip' || $extension == 'rar') bg-yellow-100 text-yellow-600
                            @else bg-gray-100 text-gray-600
                            @endif">
                            @if($extension == 'pdf')
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 11-2 0V4H6v12a1 1 0 11-2 0V4z" clip-rule="evenodd" /><path d="M11.707 9.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0z" /><path d="M10 18a1 1 0 100-2h.01a1 1 0 100 2H10z" /></svg>
                            @elseif($extension == 'docx' || $extension == 'doc')
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 0h12v2H4V6zm0 4h12v2H4v-2zm0 4h12v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2z" /></svg>
                            @elseif($extension == 'zip' || $extension == 'rar')
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm2 4a1 1 0 100 2h4a1 1 0 100-2H8zm0 3a1 1 0 100 2h4a1 1 0 100-2H8zm0 3a1 1 0 100 2h4a1 1 0 100-2H8z" clip-rule="evenodd" /></svg>
                            @else
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V7.414L11.414 4H6z" clip-rule="evenodd" /></svg>
                            @endif
                        </div>

                        {{-- File Title & Metadata --}}
                        <h3 class="font-semibold text-gray-800 dark:text-white">{{ $file->judul }}</h3>
                        <p class="text-xs text-gray-500 dark:text-neutral-400 mt-1">
                            Tipe: {{ strtoupper($extension) }} • Ukuran: {{ formatBytes($file->size) }}
                        </p>
                    </div>

                    {{-- Download Button & Admin Actions --}}
                    <div class="border-t dark:border-neutral-700 p-4 bg-gray-50 dark:bg-neutral-800/50 flex items-center justify-between rounded-b-xl">
                        <a href="{{ Storage::url($file->path) }}" download class="text-sm font-medium text-sky-600 hover:text-sky-700 dark:text-sky-400 dark:hover:text-sky-300">
                            Download
                        </a>
                        {{-- Admin Actions --}}
                        <div class="flex items-center gap-2">
                             <a href="{{ route('download.edit', $file) }}" title="Edit" class="p-2 text-yellow-600 rounded-full hover:bg-yellow-100 dark:hover:bg-neutral-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L13.196 5.196z" /></svg>
                            </a>
                            <button @click="isDeleteModalOpen = true; deleteUrl = '{{ route('download.destroy', $file) }}'" type="button" title="Hapus" class="p-2 text-red-600 rounded-full hover:bg-red-100 dark:hover:bg-neutral-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 md:col-span-2 lg:col-span-3">Belum ada file yang diunggah.</p>
            @endforelse
        </div>

        {{-- Paginasi --}}
        @if ($downloads->hasPages())
            <div class="mt-8">{{ $downloads->links() }}</div>
        @endif

        {{-- Delete Confirmation Modal --}}
        <div x-show="isDeleteModalOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50" style="display: none;">
            <div @click.away="isDeleteModalOpen = false" class="bg-white dark:bg-neutral-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Anda yakin ingin menghapus file ini? Tindakan ini tidak dapat diurungkan.</p>
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
