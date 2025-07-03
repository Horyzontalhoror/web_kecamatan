<x-layouts.app :title="'Surat'">
    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-100 text-blue-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-3-3v6m5 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v10a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Manajemen Surat Online</h2>
        </div>

        {{-- Form Input --}}
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 ...">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
            @endif
            <form method="POST" action="{{ route('surat.store') }}" class="grid gap-4 md:grid-cols-2">
                @csrf
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full ..." required>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="w-full ..." required>
                </div>
                <div class="md:col-span-2">
                    <label for="jenis_surat" class="block text-sm font-medium">Jenis Surat</label>
                    <select name="jenis_surat" id="jenis_surat" class="w-full rounded border p-2 text-sm ..." required>
                        <option value="">-- Pilih Jenis Surat --</option>
                        @foreach (config('kantor.jenis_surat') as $jenis)
                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-sky-600 text-white text-sm font-medium rounded-hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>

                        Kirim Permohonan
                    </button>
                </div>
            </form>
        </div>

        {{-- Tabel Permohonan --}}
        <div class="space-y-2">
            <h3 class="text-lg font-semibold">📑 Daftar Permohonan Surat</h3>
            <div class="overflow-x-auto rounded-lg border ...">
                <table class="min-w-full ...">
                    {{-- ... (kode thead Anda) ... --}}
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-gray-100 dark:divide-neutral-700">
                        @forelse ($surats as $surat)
                            <tr>
                                <td class="px-4 py-2">
                                    <p>{{ $surat->nama_lengkap }}</p>
                                    <p class="text-xs text-gray-500">{{ $surat->alamat }}</p>
                                </td>
                                <td class="px-4 py-2">{{ $surat->jenis_surat }}</td>
                                <td class="px-4 py-2">
                                    @if ($surat->status == 'Selesai')
                                        <span
                                            class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Selesai</span>
                                    @elseif ($surat->status == 'Ditolak')
                                        <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded"
                                            title="{{ $surat->keterangan }}">Ditolak</span>
                                    @else
                                        <span
                                            class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Diproses</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 space-x-2">
                                    @if ($surat->status == 'Diproses')
                                        <form method="POST" action="{{ route('surat.updateStatus', $surat) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="px-3 py-1 text-xs text-white bg-green-600 rounded">Selesai</button>
                                        </form>
                                        <a href="{{ route('surat.generatePdf', $surat) }}"
                                            class="px-3 py-1 text-xs text-white bg-indigo-600 rounded">Generate PDF</a>
                                        {{-- Tombol Tolak bisa ditambahkan di sini dengan modal --}}
                                    @elseif ($surat->status == 'Selesai' && $surat->path_pdf)
                                        <a href="{{ Storage::url($surat->path_pdf) }}" target="_blank"
                                            class="px-3 py-1 text-xs text-white bg-blue-600 rounded">Lihat PDF</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center">Belum ada permohonan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $surats->links() }}</div>
        </div>

        {{-- Informasi Tambahan --}}
        <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            Gunakan aksi di tabel untuk memverifikasi dan mencetak surat warga.
        </div>

    </div>
</x-layouts.app>
