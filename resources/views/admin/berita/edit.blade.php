<x-layouts.app :title="'Edit Berita'">
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold">Edit Berita</h2>
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 ...">
            <form method="POST" action="{{ route('berita.update', $berita) }}" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="judul" class="block text-sm font-medium">Judul Berita</label>
                    <input type="text" name="judul" id="judul" required class="w-full ..."
                        value="{{ old('judul', $berita->judul) }}">
                </div>
                <div>
                    <label for="isi" class="block text-sm font-medium">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="4" required class="w-full ...">{{ old('isi', $berita->isi) }}</textarea>
                </div>
                <div>
                    <label for="foto" class="block text-sm font-medium">Ganti Foto (Opsional)</label>
                    @if ($berita->foto)
                        <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}"
                            class="w-32 h-auto rounded-md my-2">
                    @endif
                    <input type="file" name="foto" id="foto" accept="image/*" class="w-full ...">
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>

                    Simpan Berita
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
