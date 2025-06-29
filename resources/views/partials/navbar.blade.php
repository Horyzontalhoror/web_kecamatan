<!-- Header Utama -->
<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="max-w-screen-xl mx-auto flex flex-wrap justify-between items-center p-4">
        {{-- Logo & Nama --}}
        <a href="/" class="flex items-center space-x-4 rtl:space-x-reverse">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Lambang_Bangkalan.png" class="h-14 sm:h-16" alt="Logo" />
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white leading-snug">
                    Kecamatan Tanjung Bumi
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Kabupaten Bangkalan</p>
            </div>
        </a>

        {{-- Info Kontak + Tombol --}}
        <div class="flex items-center space-x-6 rtl:space-x-reverse text-sm">
            <div class="hidden sm:block text-gray-700 dark:text-white">
                <div class="flex items-center mb-1">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <a href="tel:+62321123456" class="hover:underline">0321 123456</a>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.9 5.26a2 2 0 002.2 0L21 8m-18 4v7a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                    </svg>
                    <a href="mailto:kec.tanjungbumi@bangkalankab.go.id" class="hover:underline">kec.tanjungbumi@bangkalankab.go.id</a>
                </div>
            </div>

            {{-- Tombol Login --}}
            <a href="{{ route('dashboard') }}">
                <button class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition-all shadow hover:shadow-lg">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10H12C6.438 21.962 2 17.5 2 12Zm10-5a3.25 3.25 0 1 0 0 6.5A3.25 3.25 0 0 0 12 7Z" clip-rule="evenodd"/>
                    </svg>
                    Login
                </button>
            </a>
        </div>
    </div>
</nav>

<!-- Navigasi Bawah -->
<nav class="bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="max-w-screen-xl mx-auto px-4 py-4">
        <ul class="flex flex-wrap justify-center gap-4 sm:gap-6 text-sm sm:text-base font-medium">
            <li>
                <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home')
                    ? 'text-blue-600 font-semibold'
                    : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}"
                   class="{{ request()->routeIs('profil')
                       ? 'text-blue-600 font-semibold'
                       : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                   Profil
                </a>
            </li>
            <li>
                <a href="{{ route('layanan') }}"
                   class="{{ request()->routeIs('layanan')
                       ? 'text-blue-600 font-semibold'
                       : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                   Layanan
                </a>
            </li>
            <li>
                <a href="{{ route('suratonline') }}"
                   class="{{ request()->routeIs('suratonline')
                       ? 'text-blue-600 font-semibold'
                       : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                   Surat Online
                </a>
            </li>
            <li>
                <a href="{{ route('beritakegiatan') }}"
                   class="{{ request()->routeIs('beritakegiatan')
                       ? 'text-blue-600 font-semibold'
                       : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                   Berita & Kegiatan
                </a>
            </li>
            <li>
                <a href="{{ route('unduhan') }}"
                   class="{{ request()->routeIs('unduhan')
                       ? 'text-blue-600 font-semibold'
                       : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                   Download
                </a>
            </li>
            <li>
                <a href="{{ route('kontak') }}"
                   class="{{ request()->routeIs('kontak')
                       ? 'text-blue-600 font-semibold'
                       : 'text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400' }} transition">
                   Kontak
                </a>
            </li>
        </ul>
    </div>
</nav>

