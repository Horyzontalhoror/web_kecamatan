@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-4 border-b-4 border-blue-600 inline-block pb-1">
            🌍 Profil Kecamatan
        </h1>

        <article class="mt-8 bg-gradient-to-br from-white to-blue-50 dark:from-gray-900 dark:to-gray-800 p-6 rounded-2xl shadow-lg transition-all duration-300">
            <p class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6 border-l-4 pl-4 border-blue-600">
                Sekilas Tentang Kecamatan Tanjung Bumi
            </p>

            <div class="grid max-w-screen-xl mx-auto lg:grid-cols-12 gap-8">
                <!-- Teks -->
                <div class="lg:col-span-7 space-y-6 text-gray-700 dark:text-gray-300">
                    <p class="text-lg md:text-xl font-light leading-relaxed">
                        <span class="drop-cap text-6xl font-bold text-blue-700 dark:text-blue-400 float-left mr-3">K</span>
                        ecamatan Tanjung Bumi merupakan salah satu dari 18 kecamatan yang berada di Kabupaten Bangkalan, Jawa Timur. Terletak di utara Pulau Madura, wilayah ini meliputi ±108,6 km² dengan 20 desa.
                        Sebagian besar warganya berprofesi sebagai nelayan, petani, dan pedagang. Kesenian lokal seperti <strong>batik Tanjung Bumi</strong> menjadi identitas budaya yang kuat dan bernilai tinggi.
                    </p>

                    <p class="text-lg md:text-xl font-light leading-relaxed">
                        Dikenal pula dengan pesona alamnya—pantai dan perbukitan yang memukau—Kecamatan ini menjadi potensi strategis dalam pengembangan sektor <span class="font-medium text-blue-700 dark:text-blue-400">ekonomi & pariwisata</span> Kabupaten Bangkalan.
                    </p>
                </div>

                <!-- Peta -->
                <div class="lg:col-span-5 flex flex-col space-y-6">
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <iframe class="w-full h-64 rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1182.3679039359183!2d113.07320684194569!3d-6.890967222303633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd83edfb6f372c7%3A0x242b93e3251c0e7b!2sJl.%20Raya%20Macajah%20No.203%2C%20Tj.%20Bumi%2C%20Kec.%20Tj.%20Bumi%2C%20Kabupaten%20Bangkalan%2C%20Jawa%20Timur%2069156!5e1!3m2!1sid!2sid!4v1750224800334!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <iframe class="w-full h-64 rounded-lg" src="https://www.google.com/maps/embed?pb=!4v1750224597469!6m8!1m7!1sUGK6GoHlTTMnqyBR739X_g!2m2!1d-6.890746761900317!2d113.0743810574584!3f180.8220728221803!4f-0.8089519475713018!5f0.7820865974627469" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </article>

        <article class="format lg:format-lg bg-gradient-to-br from-white to-blue-50 dark:from-gray-900 dark:to-gray-800 rounded-2xl shadow-lg px-6 py-12 mt-12 transition-all duration-300">

            <!-- VISI -->
            <div class="max-w-screen-xl mx-auto mb-12">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Visi Kecamatan</h2>
                </div>
                <p class="text-lg font-light text-gray-600 dark:text-gray-300 leading-relaxed border-l-4 border-blue-600 pl-4">
                    Terwujudnya pemerintahan kecamatan yang transparan, profesional, dan melayani masyarakat secara optimal.
                </p>
            </div>

            <!-- MISI -->
            <div class="max-w-screen-xl mx-auto">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Misi Kecamatan</h2>
                </div>
                <ul class="grid md:grid-cols-2 gap-x-8 gap-y-4 text-gray-700 dark:text-gray-300 text-base md:text-lg list-disc list-inside">
                    <li>Meningkatkan kualitas pelayanan publik di tingkat kecamatan.</li>
                    <li>Mengembangkan sistem kerja berbasis teknologi informasi.</li>
                    <li>Mendorong partisipasi masyarakat dalam pembangunan daerah.</li>
                    <li>Memperkuat sinergi antara pemerintah desa, kecamatan, dan kabupaten.</li>
                    <li>Mewujudkan tata kelola pemerintahan yang baik dan bersih.</li>
                </ul>
            </div>

        </article>


        <article class="mt-8 bg-gradient-to-br from-white to-blue-50 dark:from-gray-900 dark:to-gray-800 p-6 rounded-2xl shadow-lg transition-all duration-300">

            <!-- JUDUL -->
            <div class="max-w-screen-xl px-4 py-8 mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-4">Struktur Organisasi</h2>
                <p class="text-lg text-gray-500 dark:text-gray-300">Kecamatan Tanjung Bumi, Kabupaten Bangkalan</p>
            </div>

            <!-- WRAPPER UTAMA -->
            <div class="max-w-screen-xl px-4 pb-16 mx-auto space-y-10 text-white dark:text-white ">

                <!-- Level 1 -->
                <div class="flex justify-center">
                    <div class="org-box">
                        <p class="title">CAMAT</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>IMAM MAFFUD SH MM</p>
                    </div>
                </div>

                <!-- Garis horizontal untuk menghubungkan antar org-box -->
                <div class="connector-line-horizontal"></div>

                <!-- Level 2 -->
                <div class="flex justify-center">
                    <div class="org-box">
                        <p class="title">SEKRETARIS KECAMATAN</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>BACHTIAR ARIEF</p>
                        <p>BUDIMAN SH</p>
                    </div>
                </div>

                <!-- Garis horizontal untuk menghubungkan antar org-box -->
                <div class="connector-line-horizontal"></div>

                <!-- Level 3 -->
                <div class="flex flex-wrap justify-center gap-6">
                    <div class="org-box">
                        <p class="title">SUBBAG UMUM DAN KEPEGAWAIAN</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>MUSTOFA ASYHAR SH</p>
                        <p>JASULI</p>
                        <p>HENDRIK AGUS SAPUTRO</p>
                        <p>SUDARYANTI BUDIARTI SH</p>
                    </div>
                    <div class="org-box">
                        <p class="title">SUBBAG PERENCANAAN KEUANGAN</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>MERI ISTINANI SE</p>
                        <p>ABDUL MUN SETIAWAN</p>
                        <p>LINA ARYANI</p>
                        <p>NUR EKA RAHMAWATI SH</p>
                    </div>
                </div>

                <!-- Garis horizontal untuk menghubungkan antar org-box -->
                <div class="connector-line-horizontal"></div>

                <!-- Level 4 -->
                <div class="flex flex-wrap justify-center gap-6">
                    <div class="org-box">
                        <p class="title">SEKSI PEMERINTAHAN</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>SUHARTO SE</p>
                        <p>MUARIP</p>
                        <p>MOHAMMAD</p>
                        <p>HANDOKO SH</p>
                        <p>KHIRON HASYIM</p>
                        <p>SUYADI</p>
                    </div>
                    <div class="org-box">
                        <p class="title">SEKSI TRANTIB</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>AKH SUCINTO SE</p>
                        <p>ERNA YULIANTI</p>
                        <p>MUHIBBAN</p>
                        <p>SALIMAN ALI HOLIL</p>
                        <p>HOLIFATUR ROSIDI</p>
                    </div>
                    <div class="org-box">
                        <p class="title">SEKSI PEMB. MASYARAKAT</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>DRS MUKARYOSO MSI</p>
                        <p>NUR SIDIK</p>
                        <p>BUDI ISKANDAR</p>
                        <p>YULIAN DWI</p>
                        <p>WAHYONO</p>
                        <p>ASMUNI</p>
                    </div>
                    <div class="org-box">
                        <p class="title">SEKSI KESMAS</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>FAITHAN SH MSI</p>
                        <p>ANDI MARIANTO</p>
                        <p>AFRISAL HADI SH</p>
                        <p>CANDRA P DEWI S SOS</p>
                    </div>
                    <div class="org-box">
                        <p class="title">SEKSI PELAYANAN MASYARAKAT</p>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <p>MUBAYIT SH MSI</p>
                        <p>LAIFAH S KOM</p>
                        <p>MIRA SINTA</p>
                        <p>SISILIYA</p>
                        <p>ROHMI SE</p>
                        <p>FATMAWATI</p>
                    </div>
                </div>
                <!-- Garis horizontal untuk menghubungkan antar org-box -->
                <div class="connector-line-horizontal"></div>
            </div>
        </article>
    </div>
</section>
@endsection

