<x-layouts.app :title="'Edit Berita'">
    {{-- We use Alpine.js to manage the image preview --}}
    <div x-data="{
        imagePreviewUrl: '',
        existingImageUrl: '{{ $berita->foto ? Storage::url($berita->foto) : '' }}'
    }" class="space-y-6">

        {{-- Header: Title and Back Button --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-yellow-100 text-yellow-800 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L13.196 5.196z" /></svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Edit Berita</h2>
            </div>
            <a href="{{ route('berita.show', $berita) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-neutral-800 text-sm font-medium rounded-md hover:bg-gray-200 dark:hover:bg-neutral-700 transition">
                ← Kembali ke Detail
            </a>
        </div>

        {{-- Main Form Card --}}
        <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm">
            <form method="POST" action="{{ route('berita.update', $berita) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Form content with a two-column layout --}}
                <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

                    {{-- Left Column: Main Content --}}
                    <div class="lg:col-span-2 space-y-4">
                        <div>
                            <label for="judul" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Judul Berita</label>
                            <input type="text" name="judul" id="judul" required class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('judul', $berita->judul) }}">
                            @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="isi" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Isi Berita</label>
                            <textarea name="isi" id="isi" rows="10" required class="w-full p-2 text-sm rounded-md border-gray-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 focus:ring-yellow-500 focus:border-yellow-500">{{ old('isi', $berita->isi) }}</textarea>
                             @error('isi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Right Column: Image & Metadata --}}
                    <div class="lg:col-span-1 space-y-4">
                        <div>
                            <label for="foto" class="block text-sm font-medium mb-1 text-gray-700 dark:text-neutral-300">Foto Dokumentasi</label>

                            {{-- Image Preview Area --}}
                            <div class="mt-2">
                                <template x-if="imagePreviewUrl">
                                    <img :src="imagePreviewUrl" alt="Pratinjau Gambar Baru" class="rounded-md w-full h-auto object-cover border dark:border-neutral-600">
                                </template>
                                <template x-if="!imagePreviewUrl && existingImageUrl">
                                    <img :src="existingImageUrl" alt="Gambar Saat Ini" class="rounded-md w-full h-auto object-cover border dark:border-neutral-600">
                                </template>
                                <template x-if="!imagePreviewUrl && !existingImageUrl">
                                    <div class="border-2 border-dashed border-gray-300 dark:border-neutral-600 rounded-md w-full h-40 flex items-center justify-center">
                                        <p class="text-sm text-gray-400">Tidak ada gambar</p>
                                    </div>
                                </template>
                            </div>

                            {{-- File Input --}}
                            <input @change="imagePreviewUrl = $event.target.files.length ? URL.createObjectURL($event.target.files[0]) : ''" type="file" name="foto" id="foto" accept="image/*" class="w-full text-sm text-gray-500 mt-4 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                             @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Remove Image Checkbox --}}
                        <template x-if="existingImageUrl">
                             <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remove_foto" name="remove_foto" type="checkbox" value="1" class="focus:ring-red-500 h-4 w-4 text-red-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remove_foto" class="font-medium text-gray-700 dark:text-neutral-300">Hapus Foto Saat Ini</label>
                                    <p class="text-gray-500 dark:text-neutral-400">Centang untuk menghapus gambar yang ada tanpa menggantinya.</p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Form Actions Footer --}}
                <div class="p-4 bg-gray-50 dark:bg-neutral-800/50 border-t dark:border-neutral-700 flex justify-end gap-3 rounded-b-xl">
                    <a href="{{ route('berita.show', $berita) }}" class="px-4 py-2 text-sm bg-gray-200 dark:bg-neutral-700 rounded-md">Batal</a>
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-md hover:bg-yellow-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" /></svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
