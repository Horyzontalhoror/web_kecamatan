<x-layouts.app :title="$berita->judul">
    {{-- We use Alpine.js for the delete confirmation modal --}}
    <div x-data="{ isDeleteModalOpen: false, deleteUrl: '' }" class="space-y-6">

        {{-- Header: Navigation & Admin Actions --}}
        <div class="flex flex-wrap items-center justify-between gap-4">
            {{-- Back Button --}}
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-neutral-800 text-sm font-medium rounded-md hover:bg-gray-200 dark:hover:bg-neutral-700 transition">
                ← Kembali ke Daftar Berita
            </a>

            {{-- Admin Action Buttons --}}
            <div class="flex items-center gap-2">
                <a href="{{ route('berita.edit', $berita) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-md hover:bg-yellow-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L13.196 5.196z" /></svg>
                    <span>Edit</span>
                </a>
                <button @click="isDeleteModalOpen = true; deleteUrl = '{{ route('berita.destroy', $berita) }}'" type="button" class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    <span>Hapus</span>
                </button>
            </div>
        </div>

        {{-- Article Content --}}
        <article class="rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 shadow-sm overflow-hidden">
            {{-- Featured Image --}}
            @if($berita->foto)
                <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-80 object-cover">
            @endif

            <div class="p-6 md:p-8">
                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ $berita->judul }}
                </h1>

                {{-- Metadata --}}
                <p class="text-sm text-gray-500 dark:text-neutral-400 mt-2">
                    Dipublikasikan pada {{ $berita->created_at->isoFormat('dddd, D MMMM YYYY') }}
                </p>

                {{-- Divider --}}
                <hr class="my-6 dark:border-neutral-700">

                {{-- Main Content Body --}}
                {{-- The 'prose' class automatically styles paragraphs, headings, lists, etc. --}}
                {{-- Using {!! !!} is crucial if your content contains HTML (e.g., from a rich text editor) --}}
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    {!! nl2br(e($berita->isi)) !!}
                </div>
            </div>
        </article>

        {{-- Delete Confirmation Modal (reused from the index page) --}}
        <div x-show="isDeleteModalOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50" style="display: none;">
            <div @click.away="isDeleteModalOpen = false" class="bg-white dark:bg-neutral-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Anda yakin ingin menghapus berita ini secara permanen?</p>
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
