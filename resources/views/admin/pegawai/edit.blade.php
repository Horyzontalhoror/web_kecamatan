<x-layouts.app :title="'Edit Aktivitas Pegawai'">
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold">Edit Aktivitas Pegawai</h2>

        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 ...">
            <form method="POST" action="{{ route('aktivitas-pegawai.update', $aktivitas->id) }}" class="space-y-4">
                @csrf
                @method('PUT')
                {{-- Input Nama Pegawai --}}
                <div>
                    <label for="nama_pegawai" class="block text-sm font-medium">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" id="nama_pegawai" required class="w-full mt-1"
                        value="{{ old('nama_pegawai', $aktivitas->nama_pegawai) }}">
                </div>
                {{-- Input Tanggal --}}
                <div>
                    <label for="tanggal_aktivitas" class="block text-sm font-medium">Tanggal Aktivitas</label>
                    <input type="date" name="tanggal_aktivitas" id="tanggal_aktivitas" required class="w-full mt-1"
                        value="{{ old('tanggal_aktivitas', $aktivitas->tanggal_aktivitas->format('Y-m-d')) }}">
                </div>
                {{-- Input Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium">Deskripsi Aktivitas</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" required class="w-full mt-1">{{ old('deskripsi', $aktivitas->deskripsi) }}</textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md
               hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
               transition-colors duration-200 ease-in-out">

                    {{-- Ikon Centang --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>

                    Perbaharui Aktivitas
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
