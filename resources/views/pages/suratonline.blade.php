@extends('layouts.app')

@section('content')
    <section
        class="bg-gradient-to-br from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12">
        <div class="max-w-screen-xl px-6 mx-auto">
            {{-- Header --}}
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">Layanan Surat Online</h1>
                <p class="text-gray-700 dark:text-gray-300 text-lg">
                    Ajukan surat resmi seperti Domisili, Usaha, dan lainnya secara digital.
                </p>
            </div>

            {{-- Form Pengajuan --}}
            <div
                class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg ring-1 ring-gray-100 dark:ring-gray-700 max-w-3xl mx-auto">
                {{-- Tampilkan pesan sukses --}}
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg text-center">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Menampilkan error validasi --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('suratonline.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    {{-- Nama --}}
                    <div>
                        <label for="nama_lengkap"
                            class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Contoh: Ahmad Setiawan"
                            value="{{ old('nama_lengkap') }}"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Alamat
                            Lengkap (Sesuai KTP)</label>
                        <textarea name="alamat" id="alamat" rows="2"
                            placeholder="Contoh: Jl. Merdeka No. 10, RT 01/RW 02, Desa Sumber Makmur"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>{{ old('alamat') }}</textarea>
                    </div>

                    {{-- Kontak (No. HP / Email) --}}
                    <div>
                        <label for="kontak" class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Kontak
                            (No. HP atau Email)</label>
                        <input type="text" name="kontak" id="kontak"
                            placeholder="Contoh: 08123456789 atau nama@email.com" value="{{ old('kontak') }}"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    {{-- Jenis Surat --}}
                    <div>
                        <label for="jenis_surat"
                            class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat"
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">-- Pilih Jenis Surat --</option>
                            @foreach (config('kantor.jenis_surat') as $jenis)
                                <option value="{{ $jenis }}" {{ old('jenis_surat') == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Keterangan Tambahan --}}
                    <div>
                        <label for="keterangan"
                            class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Keterangan Tambahan
                            (Opsional)</label>
                        <textarea name="keterangan" id="keterangan" rows="2"
                            placeholder="Tuliskan keperluan atau informasi tambahan di sini..."
                            class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 px-4 py-2 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('keterangan') }}</textarea>
                    </div>

                    {{-- Upload Dokumen --}}
                    <div>
                        <label for="dokumen_pendukung"
                            class="block text-sm font-semibold text-gray-800 dark:text-white mb-1">Upload Dokumen Pendukung
                            (KTP, KK, dll)</label>
                        <input type="file" name="dokumen_pendukung[]" id="dokumen_pendukung" multiple
                            class="w-full rounded-lg border border-dashed border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 px-4 py-3 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm hover:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="font-semibold">Ajukan Surat Sekarang</span>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Info Registrasi --}}
            <div class="mt-8 flex items-center justify-center gap-3 text-sm text-gray-700 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
                <span>Setelah pengajuan, Anda akan menerima <strong class="text-blue-600">Nomor Registrasi</strong> untuk
                    mengecek status surat.</span>
            </div>
        </div>
    </section>
@endsection
