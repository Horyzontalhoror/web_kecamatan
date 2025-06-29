@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-br from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12">
    <div class="max-w-screen-xl mx-auto px-6">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4 text-center">Layanan Kecamatan</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 text-center mb-10">Berbagai layanan administrasi yang tersedia di Kecamatan Tanjung Bumi</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['title' => 'KTP', 'desc' => 'Pembuatan KTP elektronik yang cepat dan mudah.', 'icon' => 'id-badge'],
                ['title' => 'KK', 'desc' => 'Pembuatan Kartu Keluarga (KK) yang cepat dan mudah.', 'icon' => 'users'],
                ['title' => 'Akta Lahir', 'desc' => 'Pembuatan Akta Lahir yang cepat dan mudah.', 'icon' => 'baby'],
                ['title' => 'Akta Kematian', 'desc' => 'Pembuatan Akta Kematian yang cepat dan mudah.', 'icon' => 'skull-crossbones']
            ] as $layanan)
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-blue-500">
                <div class="flex flex-col items-center text-center space-y-4">
                    <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            @switch($layanan['icon'])
                                @case('id-badge')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2H8a2 2 0 00-2 2v2H4a2 2 0 00-2 2v8a2 2 0 002 2h2v2a2 2 0 002 2h8a2 2 0 002-2v-2h2a2 2 0 002-2V8a2 2 0 00-2-2h-2V4a2 2 0 00-2-2z" />
                                @break
                                @case('users')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m1-4a4 4 0 11-8 0 4 4 0 018 0zm10 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                @break
                                @case('baby')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.341A8 8 0 114.574 8.659m0 0A9 9 0 1116 19a7 7 0 01-11.426-6.341z" />
                                @break
                                @case('skull-crossbones')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m0 14v1m-8-8H3m18 0h-1M5.05 5.05l-.707.707M18.364 18.364l-.707.707M5.05 18.364l.707.707M18.364 5.05l.707.707" />
                                @break
                            @endswitch
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $layanan['title'] }}</h2>
                    <p class="text-gray-600 dark:text-gray-300">{{ $layanan['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
