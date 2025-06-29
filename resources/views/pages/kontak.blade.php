@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-white via-blue-50 to-blue-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <div class="max-w-screen-xl px-4 py-12 mx-auto">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md space-y-10">

            {{-- Judul dan Deskripsi --}}
            <div class="text-center">
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-3">📬 Hubungi Kami</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                    Ada pertanyaan atau saran? Silakan hubungi Kantor Kecamatan melalui form, email, atau telepon di bawah ini.
                </p>
            </div>

            {{-- Info Kontak --}}
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-lg p-6">
                <div class="space-y-5 text-center">
                    <div>
                        <h4 class="font-bold text-gray-800 dark:text-white">📍 Alamat</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Jl. Raya Tanjung Bumi No.1, Kabupaten Bangkalan, Jawa Timur</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 dark:text-white">⏰ Jam Kerja</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Senin - Jumat: 08.00 - 15.00 WIB</p>
                    </div>
                    <div class="flex justify-center items-center gap-2 text-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+62321123456" class="text-blue-600 hover:underline">0321 123456</a>
                    </div>
                    <div class="flex justify-center items-center gap-2 text-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.9 5.26a2 2 0 002.2 0L21 8m-18 4v7a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                        </svg>
                        <a href="mailto:kec.tanjungbumi@bangkalankab.go.id"
                           class="text-blue-600 hover:underline">kec.tanjungbumi@bangkalankab.go.id</a>
                    </div>
                </div>
            </div>

            {{-- Google Maps --}}
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1182.367474986685!2d113.07403528101432!3d-6.891139215729636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd83f546438eb05%3A0x7fce7277479a50ae!2sKantor%20Kecamatan%20Tanjungbumi!5e1!3m2!1sid!2sid!4v1751194871967!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            {{-- Form Kontak --}}
            <form action="#" class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">
                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" required
                           class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 p-2 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           placeholder="contoh@gmail.com">
                </div>
                <div>
                    <label for="subject" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Subjek</label>
                    <input type="text" id="subject" required
                           class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 p-2 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Apa yang ingin Anda sampaikan?">
                </div>
                <div>
                    <label for="message" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Pesan</label>
                    <textarea id="message" rows="6"
                              class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 p-2 text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Tuliskan saran atau pengaduan Anda di sini..."></textarea>
                </div>
                <button type="submit"
                        class="w-full py-3 px-5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 transition focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
