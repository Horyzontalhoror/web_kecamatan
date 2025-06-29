<footer class="bg-white dark:bg-gray-900 mt-auto border-t border-gray-200 dark:border-gray-700">
    <div class="max-w-screen-xl mx-auto px-4 py-8 sm:py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Logo dan Info --}}
            <div class="flex items-start gap-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Lambang_Bangkalan.png" class="h-16" alt="Logo">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Kecamatan Tanjung Bumi</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Kabupaten Bangkalan, Jawa Timur</p>
                </div>
            </div>

            {{-- Resources --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-900 uppercase dark:text-white mb-3">Resources</h3>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li>
                        <a href="https://www.nomor.net/_kodepos.php?_i=desa-kodepos&sby=100000&daerah=Kecamatan-Kab.-Bangkalan&jobs=Tanjung%20Bumi%20(Tanjungbumi)" class="hover:underline">
                            Daftar Desa
                        </a>
                    </li>
                    <li>
                        <a href="https://id.wikipedia.org/wiki/Tanjung_Bumi,_Bangkalan" class="hover:underline">
                            Wikipedia
                        </a>
                    </li>
                    <li>
                        <a href="https://searchengine.web.bps.go.id/search?q=Kecamatan+Tanjung+Bumi&content=all&page=1&title=0&mfd=all&from=all&to=all&sort=relevansi" class="hover:underline">
                            Statistik Kecamatan
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Legal --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-900 uppercase dark:text-white mb-3">Legal</h3>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Garis dan Copyright --}}
        <div class="mt-10 border-t border-gray-200 dark:border-gray-700 pt-6 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} Kecamatan Tanjung Bumi. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
