<x-layouts.app :title="'Arsip'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            {{-- Icon --}}
        </div>
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Digitalisasi Arsip</h2>

        {{-- Form Upload Arsip --}}
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 dark:border-neutral-700">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md">...</div>
            @endif

            <form method="POST" action="{{ route('arsip.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="file_arsip" class="block text-sm font-medium">Upload Arsip (PDF / JPG / PNG)</label>
                    <input type="file" name="file_arsip" id="file_arsip" required accept=".pdf,.jpg,.jpeg,.png"
                        class="w-full mt-1">
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="kategori" class="block text-sm font-medium">Kategori Surat</label>
                        <select name="kategori" id="kategori" required class="w-full mt-1 dark:text-neutral-200 bg-white dark:bg-neutral-800">
                            <option>Surat Masuk</option>
                            <option>Surat Keluar</option>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal_arsip" class="block text-sm font-medium">Tanggal Arsip</label>
                        <input type="date" name="tanggal_arsip" id="tanggal_arsip" required class="w-full mt-1 dark:text-neutral-200 bg-white dark:bg-neutral-800" />
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white ...">
                    Upload Arsip
                </button>
            </form>
        </div>

        {{-- Form Pencarian Arsip --}}
        <div class="space-y-2">
            <h3 class="text-lg font-semibold">📁 Pencarian Arsip</h3>
            <form method="GET" action="{{ route('arsip.index') }}" class="flex items-center gap-2">
                <input type="text" name="search" placeholder="Cari berdasarkan nama/kategori"
                    value="{{ request('search') }}" class="flex-1 dark:text-neutral-200 bg-white dark:bg-neutral-800" />
                <button type="submit" class="px-4 py-2 bg-gray-700 text-white">Cari</button>
            </form>
        </div>

        {{-- Daftar Arsip Dinamis --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse ($arsips as $arsip)
                <div class="p-4 border rounded bg-white dark:bg-neutral-800 dark:border-neutral-700">
                    <p class="font-medium truncate">{{ $arsip->nama_file }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Kategori: {{ $arsip->kategori }} • {{ $arsip->tanggal_arsip->format('d F Y') }}
                    </p>
                    <div class="flex items-center justify-start space-x-2 mt-2">

                        {{-- Tombol Lihat Arsip (Embed) --}}
                        <a href="{{ route('arsip.view', $arsip) }}" target="_blank" title="Lihat Arsip"
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
                        <a href="{{ Storage::url($arsip->path) }}" download title="Unduh Arsip"
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
                        <form method="POST" action="{{ route('arsip.destroy', $arsip) }}"
                            onsubmit="return confirm('Anda yakin ingin menghapus arsip ini?');" class="inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Hapus Arsip"
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
                <p class="md:col-span-2 text-center text-gray-500">Tidak ada arsip yang ditemukan.</p>
            @endforelse
        </div>

        {{-- Link Paginasi --}}
        <div class="mt-4">
            {{ $arsips->links() }}
        </div>
    </div>
</x-layouts.app>
