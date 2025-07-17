@extends('layouts.app')

@section('content')
    {{-- Added keydown listener for Esc key to close the modal --}}
    <div x-data="{ isModalOpen: false, selectedBerita: null }" @keydown.escape.window="isModalOpen = false">

        <section
            class="bg-gradient-to-b from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-16">
            <div class="max-w-screen-xl px-6 mx-auto space-y-12">
                {{-- Header Section --}}
                <div class="text-center">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-800 dark:text-white mb-2">📰 Berita & Kegiatan
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 text-lg max-w-2xl mx-auto">Ikuti perkembangan, dokumentasi,
                        dan informasi terbaru dari kegiatan di lingkungan kami.</p>
                </div>

                {{-- News Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($beritas as $berita)
                        <div @click="isModalOpen = true; selectedBerita = {{ json_encode($berita) }}"
                            class="group cursor-pointer flex flex-col bg-white dark:bg-neutral-800/50 rounded-2xl border border-gray-200 dark:border-neutral-700 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                            {{-- Consistent Image with Aspect Ratio --}}
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ $berita->foto ? Storage::url($berita->foto) : 'https://via.placeholder.com/400x225.png?text=Berita' }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            {{-- Card Content --}}
                            <div class="p-5 flex flex-col flex-grow">
                                <h3
                                    class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-sky-600 transition mb-2">
                                    {{ $berita->judul }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 flex-grow">
                                    {{ Str::limit($berita->isi, 100) }}</p>
                                <div
                                    class="text-xs text-gray-500 dark:text-gray-400 mt-4 pt-4 border-t border-gray-100 dark:border-neutral-700">
                                    📅 Diposting: {{ $berita->created_at?->isoFormat('D MMMM YYYY') }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-3 text-center py-16 text-gray-500">
                            <p class="text-xl">Oops!</p>
                            <p>Belum ada berita yang dipublikasikan saat ini.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Paginasi --}}
                @if ($beritas->hasPages())
                    <div class="mt-8">{{ $beritas->links() }}</div>
                @endif
            </div>
        </section>

        {{-- MODAL / POPUP --}}
        <div x-show="isModalOpen" x-transition
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75" style="display: none;">

            {{-- Kontainer Modal --}}
            <div @click.away="isModalOpen = false"
                class="bg-white dark:bg-neutral-900 rounded-2xl shadow-xl w-full max-w-4xl max-h-[90vh] overflow-hidden">

                <template x-if="selectedBerita">
                    <div class="flex flex-col h-full">
                        {{-- Modal Header (Tetap) --}}
                        <div
                            class="p-5 border-b border-gray-200 dark:border-neutral-800 flex justify-between items-center flex-shrink-0">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white" x-text="selectedBerita.judul"></h2>
                            <button @click="isModalOpen = false"
                                class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-neutral-800" title="Tutup">
                                <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        {{-- Modal Body (Sekarang bisa di-scroll) --}}
                        <div class="flex-1 p-6 space-y-4 overflow-y-auto">
                            <img x-show="selectedBerita.foto" :src="'/storage/' + selectedBerita.foto" alt="Foto Berita"
                                class="w-full h-auto max-h-80 object-cover rounded-lg">
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p>Diposting pada <span
                                        x-text="selectedBerita.created_at ? new Date(selectedBerita.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : ''"></span>
                                </p>
                            </div>
                            <div class="prose prose-lg dark:prose-invert max-w-none text-gray-800 dark:text-gray-200"
                                x-html="selectedBerita.isi ? selectedBerita.isi.replace(/(\r\n?|\n)/g, '<br>') : ''">
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
@endsection
