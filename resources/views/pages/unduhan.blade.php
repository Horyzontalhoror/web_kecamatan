@extends('layouts.app')

@section('content')
    <section
        class="bg-gradient-to-b from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12">
        <div class="max-w-screen-xl px-6 mx-auto space-y-12">

            {{-- Judul --}}
            <div class="text-center lg:text-left">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                    📁 Unduhan
                </h2>
                <p class="text-gray-700 dark:text-gray-300 text-lg">
                    Formulir kosong, pedoman, dan laporan Dana Desa yang dapat diunduh oleh masyarakat.
                </p>
            </div>

            {{-- Daftar File Unduhan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($downloads as $download)
                    <div
                        class="bg-white dark:bg-neutral-900 p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition">
                        <div class="flex items-start gap-4">
                            <div class="text-blue-600 dark:text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">{{ $download->judul }}
                                </h3>
                                {{-- Link ini akan langsung mengunduh file --}}
                                <a href="{{ Storage::url($download->path) }}" download
                                    class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                                    📥 Download File
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="lg:col-span-3 text-center py-12 text-gray-500">
                        <p>Belum ada file yang tersedia untuk diunduh.</p>
                    </div>
                @endforelse
            </div>

            {{-- Link Paginasi --}}
            <div class="mt-8">
                {{ $downloads->links() }}
            </div>
        </div>
    </section>
@endsection
