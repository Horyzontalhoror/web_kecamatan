@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-16">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 px-4">

        <!-- Konten Teks -->
        <div class="lg:col-span-6 flex flex-col justify-center space-y-6">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                Selamat Datang di<br><span class="text-blue-600 dark:text-blue-400">Kecamatan Tanjung Bumi</span>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Kecamatan Tanjung Bumi merupakan salah satu kecamatan di Kabupaten Bangkalan yang memiliki kekayaan budaya, potensi wilayah pesisir, dan semangat gotong royong yang tinggi.
            </p>

            <div class="flex flex-wrap gap-4 pt-2">
                <a href="{{ route('layanan') }}"
                   class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all duration-200">
                    Layanan Masyarakat
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ route('kontak') }}"
                   class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-800 transition-all duration-200">
                    Kontak Kami
                </a>
            </div>
        </div>

        <!-- Peta Interaktif -->
        <div class="lg:col-span-6">
            <div class="rounded-2xl overflow-hidden shadow-2xl">
                <iframe class="w-full h-[400px] border-none"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d75670.32640080857!2d113.03412259691791!3d-6.898603054337615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd83e8dc2bfbc79%3A0x4027a76e3cd8bb0!2sKec.%20Tj.%20Bumi%2C%20Kabupaten%20Bangkalan%2C%20Jawa%20Timur!5e1!3m2!1sid!2sid!4v1750181549473!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection
