<x-layouts.app :title="'Manajemen Surat Online'">
    {{-- Kita bungkus semua dengan Alpine.js untuk mengelola SEMUA modal --}}
    <div x-data="{
        isRejectModalOpen: false, rejectUrl: '',
        isDeleteModalOpen: false, deleteUrl: ''
    }" class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-100 text-blue-800 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m5 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v10a2 2 0 01-2 2z" /></svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Manajemen Surat Online</h2>
        </div>

        {{-- Form Input Admin (Collapsible) --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900 shadow-sm">
            @if (session('success'))
                <div class="p-4 mb-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="p-4 mb-4 bg-red-100 text-red-800 rounded-md">{{ session('error') }}</div>
            @endif
            <details>
                <summary class="font-semibold text-gray-800 dark:text-white cursor-pointer select-none">Tambah Permohonan Baru (Klik untuk Buka)</summary>
                <form method="POST" action="{{ route('surat.store') }}" class="grid gap-4 md:grid-cols-2 mt-4 pt-4 border-t dark:border-neutral-700">
                    {{-- Form content remains the same --}}
                    @csrf
                    <div><label for="nama_lengkap" class="block text-sm font-medium mb-1">Nama Lengkap</label><input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800" required></div>
                    <div><label for="kontak" class="block text-sm font-medium mb-1">Kontak (No. HP/Email)</label><input type="text" name="kontak" id="kontak" class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800" required></div>
                    <div class="md:col-span-2"><label for="alamat" class="block text-sm font-medium mb-1">Alamat</label><textarea name="alamat" id="alamat" rows="2" class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800" required></textarea></div>
                    <div class="md:col-span-2"><label for="jenis_surat" class="block text-sm font-medium mb-1">Jenis Surat</label><select name="jenis_surat" id="jenis_surat" class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800" required><option value="">-- Pilih Jenis Surat --</option>@foreach (config('kantor.jenis_surat') as $jenis)<option value="{{ $jenis }}">{{ $jenis }}</option>@endforeach</select></div>
                    <div class="md:col-span-2"><label for="keterangan" class="block text-sm font-medium mb-1">Keterangan (Opsional)</label><textarea name="keterangan" id="keterangan" rows="2" class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800"></textarea></div>
                    <div class="md:col-span-2"><button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">Simpan Permohonan</button></div>
                </form>
            </details>
        </div>

        {{-- Tabel Permohonan --}}
        <div class="space-y-2">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📑 Daftar Permohonan Surat</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-neutral-700">
                <table class="min-w-full text-sm">
                    {{-- Thead is correct --}}
                    <thead class="bg-gray-50 dark:bg-neutral-800">
                        <tr><th class="p-4 text-left font-medium">Pemohon</th><th class="p-4 text-left font-medium">Jenis Surat</th><th class="p-4 text-left font-medium">Status</th><th class="p-4 text-left font-medium">Aksi</th></tr>
                    </thead>
                    <tbody class="bg-white dark:bg-neutral-900 divide-y divide-gray-200 dark:divide-neutral-700">
                        @forelse ($surats as $surat)
                            <tr>
                                {{-- Table data columns are correct --}}
                                <td class="p-4 align-top"><p class="font-semibold">{{ $surat->nama_lengkap }}</p><p class="text-xs text-gray-500">{{ $surat->kontak }}</p></td>
                                <td class="p-4 align-top">{{ $surat->jenis_surat }}</td>
                                <td class="p-4 align-top">@if ($surat->status == 'Selesai')<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-md">Selesai</span>@elseif ($surat->status == 'Ditolak')<span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-md" title="Alasan: {{ $surat->keterangan }}">Ditolak</span>@else<span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-md">Diproses</span>@endif</td>
                                <td class="p-4 align-top">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">@if ($surat->keterangan && $surat->status != 'Ditolak')<button type="button" title="Keterangan Pemohon: {{ $surat->keterangan }}" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200"><svg class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg></button>@endif @if (is_array($surat->dokumen_pendukung))<div class="flex flex-col space-y-1">@foreach ($surat->dokumen_pendukung as $dok)<a href="{{ Storage::url($dok) }}" target="_blank" class="text-xs text-purple-600 hover:underline">Lampiran {{ $loop->iteration }}</a>@endforeach</div>@endif</div>
                                        <div class="flex flex-wrap items-center gap-2">
                                            @if ($surat->status == 'Diproses')
                                                <form method="POST" action="{{ route('surat.updateStatus', $surat) }}" class="inline-block">@csrf @method('PATCH')<button type="submit" class="px-3 py-1 text-xs text-white bg-green-600 rounded">Selesai</button></form>
                                                <button @click="isRejectModalOpen = true; rejectUrl = '{{ route('surat.reject', $surat) }}'" type="button" class="px-3 py-1 text-xs text-white bg-red-600 rounded">Tolak</button>
                                                <a href="{{ route('surat.generatePdf', $surat) }}" class="px-3 py-1 text-xs text-white bg-indigo-600 rounded">Generate PDF</a>
                                            @elseif ($surat->status == 'Selesai' && $surat->path_pdf)
                                                <a href="{{ Storage::url($surat->path_pdf) }}" target="_blank" class="px-3 py-1 text-xs text-white bg-blue-600 rounded">Lihat PDF</a>
                                            @endif
                                            <a href="{{ route('surat.show', $surat) }}" class="px-3 py-1 text-xs text-white bg-gray-600 rounded hover:bg-gray-700">Lihat</a>

                                            {{-- IMPROVEMENT: Replaced onsubmit with an Alpine-powered button --}}
                                            <button @click="isDeleteModalOpen = true; deleteUrl = '{{ route('surat.destroy', $surat) }}'" type="button" class="px-3 py-1 text-xs text-white bg-red-800 rounded hover:bg-red-900">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="p-4 text-center">Belum ada permohonan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $surats->links() }}</div>
        </div>

        {{-- FIX: The full modal for rejection is restored here --}}
        <div x-show="isRejectModalOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50" style="display: none;">
            <div @click.away="isRejectModalOpen = false" class="bg-white dark:bg-neutral-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-4">Alasan Penolakan</h3>
                <form :action="rejectUrl" method="POST">
                    @csrf
                    @method('PATCH')
                    <textarea name="keterangan" rows="3" class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800" placeholder="Contoh: Lampiran KTP tidak jelas." required></textarea>
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" @click="isRejectModalOpen = false" class="px-4 py-2 text-sm bg-gray-200 rounded-md">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm text-white bg-red-600 rounded-md">Tolak Permohonan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- NEW: Modal for Delete Confirmation --}}
        <div x-show="isDeleteModalOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50" style="display: none;">
            <div @click.away="isDeleteModalOpen = false" class="bg-white dark:bg-neutral-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Anda yakin ingin menghapus permohonan ini secara permanen? Tindakan ini tidak dapat diurungkan.</p>
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
