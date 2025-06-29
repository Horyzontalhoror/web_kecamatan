@extends('layouts.app') {{-- atau sesuaikan layout --}}

@section('content')
<article class="format lg:format-lg">
    <!-- JUDUL -->
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-4">Struktur Organisasi</h2>
        <p class="text-lg text-gray-500 dark:text-gray-300">Kecamatan Tanjung Bumi, Kabupaten Bangkalan</p>
    </div>

    <!-- WRAPPER UTAMA -->
    <div class="max-w-screen-xl px-4 pb-16 mx-auto space-y-10">
        <!-- Level 1, 2, 3, dst. seperti yang sudah kamu tulis sebelumnya -->
        {{-- PASTE ISI LEVEL DI SINI --}}
        <!-- WRAPPER UTAMA -->
        <div class="max-w-screen-xl px-4 pb-16 mx-auto space-y-10">

            <!-- Level 1 -->
            <div class="flex justify-center">
                <div class="org-box">
                    <p class="title">CAMAT</p>
                    <p>IMAM MAFFUD SH MM</p>
                </div>
            </div>

            <!-- Garis horizontal untuk menghubungkan antar org-box -->
            {{-- <div class="connector-line-horizontal"></div> --}}

            <!-- Level 2 -->
            <div class="flex justify-center">
                <div class="org-box">
                    <p class="title">SEKRETARIS KECAMATAN</p>
                    <p>BACHTIAR ARIEF</p>
                    <p>BUDIMAN SH</p>
                </div>
            </div>

            <!-- Garis horizontal untuk menghubungkan antar org-box -->
            {{-- <div class="connector-line-horizontal"></div> --}}

            <!-- Level 3 -->
            <div class="flex flex-wrap justify-center gap-6">
                <div class="org-box">
                    <p class="title">SUBBAG UMUM DAN KEPEGAWAIAN</p>
                    <p>MUSTOFA ASYHAR SH</p>
                    <p>JASULI</p>
                    <p>HENDRIK AGUS SAPUTRO</p>
                    <p>SUDARYANTI BUDIARTI SH</p>
                </div>
                <div class="org-box">
                    <p class="title">SUBBAG PERENCANAAN KEUANGAN</p>
                    <p>MERI ISTINANI SE</p>
                    <p>ABDUL MUN SETIAWAN</p>
                    <p>LINA ARYANI</p>
                    <p>NUR EKA RAHMAWATI SH</p>
                </div>
            </div>

            <!-- Garis horizontal untuk menghubungkan antar org-box -->
            {{-- <div class="connector-line-horizontal"></div> --}}

            <!-- Level 4 -->
            <div class="flex flex-wrap justify-center gap-6">
                <div class="org-box">
                    <p class="title">SEKSI PEMERINTAHAN</p>
                    <p>SUHARTO SE</p>
                    <p>MUARIP</p>
                    <p>MOHAMMAD</p>
                    <p>HANDOKO SH</p>
                    <p>KHIRON HASYIM</p>
                    <p>SUYADI</p>
                </div>
                <div class="org-box">
                    <p class="title">SEKSI TRANTIB</p>
                    <p>AKH SUCINTO SE</p>
                    <p>ERNA YULIANTI</p>
                    <p>MUHIBBAN</p>
                    <p>SALIMAN ALI HOLIL</p>
                    <p>HOLIFATUR ROSIDI</p>
                </div>
                <div class="org-box">
                    <p class="title">SEKSI PEMB. MASYARAKAT</p>
                    <p>DRS MUKARYOSO MSI</p>
                    <p>NUR SIDIK</p>
                    <p>BUDI ISKANDAR</p>
                    <p>YULIAN DWI</p>
                    <p>WAHYONO</p>
                    <p>ASMUNI</p>
                </div>
                <div class="org-box">
                    <p class="title">SEKSI KESMAS</p>
                    <p>FAITHAN SH MSI</p>
                    <p>ANDI MARIANTO</p>
                    <p>AFRISAL HADI SH</p>
                    <p>CANDRA P DEWI S SOS</p>
                </div>
                <div class="org-box">
                    <p class="title">SEKSI PELAYANAN MASYARAKAT</p>
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
    </div>
</article>
@endsection

@section('scripts')
<script src="{{ asset('js/organisasi.js') }}"></script>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/organisasi.css') }}">
@endsection
