<x-layouts.app :title="'Pegawai'">
    <div class="space-y-6">

        {{-- Judul Halaman --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-100 text-indigo-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 9l3 3-3 3m5 0h3m-3-6h3m4 3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Pencatatan Aktivitas Pegawai
            </h2>
        </div>

        {{-- Form Input Aktivitas --}}
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 ...">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('aktivitas-pegawai.store') }}" class="space-y-4">
                @csrf
                {{-- Input Nama Pegawai --}}
                <div>
                    <label for="nama_pegawai" class="block text-sm font-medium">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Masukkan nama lengkap"
                        required class="w-full mt-1 ...">
                </div>
                {{-- Input Tanggal --}}
                <div>
                    <label for="tanggal_aktivitas" class="block text-sm font-medium">Tanggal Aktivitas</label>
                    <input type="date" name="tanggal_aktivitas" id="tanggal_aktivitas" required
                        class="w-full mt-1 ...">
                </div>
                {{-- Input Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium">Deskripsi Aktivitas</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" placeholder="Contoh: Rapat koordinasi..." required
                        class="w-full mt-1 ..."></textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md
               hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
               transition-colors duration-200 ease-in-out">

                    {{-- Ikon Centang --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>

                    Simpan Aktivitas
                </button>
            </form>
        </div>

        {{-- Daftar Aktivitas Tersimpan --}}
        <div class="space-y-4">
            <h3 class="text-xl font-semibold">Daftar Aktivitas</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-neutral-900">
                    <thead class="bg-gray-50 dark:bg-neutral-800">
                        <tr>
                            <th class="p-4 text-left text-sm font-semibold">Nama Pegawai</th>
                            <th class="p-4 text-left text-sm font-semibold">Tanggal</th>
                            <th class="p-4 text-left text-sm font-semibold">Deskripsi</th>
                            <th class="p-4 text-left text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @forelse ($aktivitasPegawais as $aktivitas)
                            <tr>
                                <td class="p-4">{{ $aktivitas->nama_pegawai }}</td>
                                <td class="p-4">{{ $aktivitas->tanggal_aktivitas->format('d M Y') }}</td>
                                <td class="p-4">{{ $aktivitas->deskripsi }}</td>
                                <td class="p-4 flex items-center space-x-2">
                                    <a href="{{ route('aktivitas-pegawai.edit', $aktivitas) }}"
                                        class="text-yellow-500 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('aktivitas-pegawai.destroy', $aktivitas) }}"
                                        onsubmit="return confirm('Yakin?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">Belum ada data aktivitas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Paginasi --}}
            <div class="mt-4">
                {{ $aktivitasPegawais->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
