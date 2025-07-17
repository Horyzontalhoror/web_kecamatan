<x-layouts.app :title="'Detail Permohonan Surat'">
    <div class="space-y-6">
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-blue-100 text-blue-800 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Detail Permohonan Surat</h2>
            </div>
            <a href="{{ route('surat.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 dark:bg-neutral-700 text-sm font-medium rounded-md hover:bg-gray-300 dark:hover:bg-neutral-600 transition">
                ← Kembali ke Daftar
            </a>
        </div>

        {{-- Detail Content --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Left Column --}}
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <p class="text-sm text-gray-500">Jenis Surat</p>
                        <p class="text-lg font-semibold">{{ $surat->jenis_surat }}</p>
                    </div>
                     <div>
                        <p class="text-sm text-gray-500">Nomor Surat</p>
                        <p class="font-mono">{{ $surat->nomor_surat ?? 'Belum Diterbitkan' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Pemohon</p>
                        <p>{{ $surat->nama_lengkap }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kontak</p>
                        <p>{{ $surat->kontak }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p>{{ $surat->alamat }}</p>
                    </div>
                    @if($surat->keterangan)
                    <div>
                        <p class="text-sm text-gray-500">Keterangan / Keperluan</p>
                        <p class="whitespace-pre-wrap">{{ $surat->keterangan }}</p>
                    </div>
                    @endif
                </div>

                {{-- Right Column --}}
                <div class="space-y-4">
                    <div>
                        <p class="text-sm text-gray-500">Status</p>
                        <p>
                            @if ($surat->status == 'Selesai')
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-md">Selesai</span>
                            @elseif ($surat->status == 'Ditolak')
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-md">Ditolak</span>
                            @else
                                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-md">Diproses</span>
                            @endif
                        </p>
                    </div>

                    @if($surat->path_pdf)
                    <div>
                         <p class="text-sm text-gray-500 mb-1">Dokumen Final</p>
                         <a href="{{ Storage::url($surat->path_pdf) }}" target="_blank" class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                            Lihat PDF
                         </a>
                    </div>
                    @endif

                    @if (is_array($surat->dokumen_pendukung) && count($surat->dokumen_pendukung) > 0)
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Dokumen Pendukung</p>
                            <div class="flex flex-col space-y-1">
                                @foreach ($surat->dokumen_pendukung as $dok)
                                    <a href="{{ Storage::url($dok) }}" target="_blank" class="text-purple-600 hover:underline">
                                        Lampiran {{ $loop->iteration }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
