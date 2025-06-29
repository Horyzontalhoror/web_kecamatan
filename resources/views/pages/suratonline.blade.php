@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-br from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12">
    <div class="max-w-screen-xl px-6 mx-auto">
        {{-- Header --}}
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">Layanan Surat Online</h1>
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                Ajukan surat resmi seperti Domisili, Usaha, dan lainnya secara digital. Upload dokumen, dan dapatkan nomor registrasi untuk pelacakan.
            </p>
        </div>

        {{-- Form Pengajuan --}}
        <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg ring-1 ring-gray-100 dark:ring-gray-700">
            <form class="space-y-6" method="POST" enctype="multipart/form-data">
                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Nama Lengkap</label>
                    <input type="text" placeholder="Contoh: Ahmad Setiawan"
                        class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                {{-- Jenis Surat --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Jenis Surat</label>
                    <select class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Jenis Surat</option>
                        <option value="domisili">Surat Domisili</option>
                        <option value="usaha">Surat Keterangan Usaha</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                {{-- Upload Dokumen --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Upload Dokumen (KTP, KK, dll)</label>
                    <input type="file" multiple
                        class="w-full rounded-lg border border-dashed border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 px-4 py-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-4">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="font-semibold">Ajukan Surat Sekarang</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Info Registrasi --}}
        <div class="mt-8 flex items-center gap-3 text-sm text-gray-700 dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            Setelah pengajuan, Anda akan menerima <span class="text-blue-600 font-semibold">Nomor Registrasi</span> untuk mengecek status surat secara online.
        </div>
    </div>
</section>
@endsection
