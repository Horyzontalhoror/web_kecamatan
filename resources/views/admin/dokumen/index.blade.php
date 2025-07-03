<x-layouts.app :title="'Dokumen'">
    <div class="space-y-6">

        {{-- Judul --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-100 text-blue-800 rounded-full">
                {{-- SVG Icon --}}
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Manajemen Dokumen</h2>
        </div>

        {{-- Form Upload Dokumen --}}
        <div
            class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">

            {{-- Tampilkan pesan sukses atau error --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('dokumen.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="dokumen" class="block text-sm font-medium text-gray-700 dark:text-neutral-200 mb-1">
                        Unggah Dokumen (PDF / DOCX)
                    </label>
                    <input type="file" name="dokumen" id="dokumen" accept=".pdf,.doc,.docx" required
                        class="block w-full rounded-md border border-gray-300 dark:border-neutral-600 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-700 dark:text-neutral-200 bg-white dark:bg-neutral-800" />
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                    {{-- SVG Icon --}}
                    Upload Dokumen
                </button>
            </form>
        </div>

        {{-- Daftar Dokumen (Dinamis dari Database) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($dokumen as $item)
                <div
                    class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-900 shadow-sm flex flex-col justify-between">

                    {{-- Nama File --}}
                    <p class="font-medium text-gray-800 dark:text-white truncate mb-4">
                        📄 {{ $item->nama_file }}
                    </p>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-start space-x-2 mt-4">

                        {{-- Tombol Lihat Dokumen (Embed) --}}
                        <a href="{{ route('dokumen.view', $item) }}" target="_blank" title="Lihat Dokumen"
                            class="inline-flex items-center justify-center p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                            {{-- Ikon Mata --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.022 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        {{-- Tombol Unduh --}}
                        <a href="{{ Storage::url($item->path) }}" download title="Unduh Dokumen"
                            class="inline-flex items-center justify-center p-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors duration-200">
                            {{-- Ikon Unduh --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        {{-- Tombol Hapus --}}
                        <form method="POST" action="{{ route('dokumen.destroy', $item) }}"
                            onsubmit="return confirm('Anda yakin ingin menghapus dokumen ini?');" class="inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Hapus Dokumen"
                                class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                                {{-- Ikon Hapus --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>

                    </div>

                </div>
            @empty
                <div class="md:col-span-3 text-center text-gray-500 dark:text-gray-400">
                    <p>Belum ada dokumen yang diunggah.</p>
                </div>
            @endforelse
        </div>

    </div>
</x-layouts.app>
