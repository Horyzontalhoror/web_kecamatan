<x-layouts.app :title="'Edit File Download'">
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold">Edit File Download</h2>
        <div class="rounded-xl border p-6 bg-white dark:bg-neutral-900 shadow-sm space-y-4">
            <form method="POST" action="{{ route('download.update', $download) }}" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="judul" class="block text-sm font-medium dark:text-neutral-200">Nama File (Judul Tampilan)</label>
                    <input type="text" name="judul" id="judul" required class="w-full dark:text-neutral-200 bg-white dark:bg-neutral-800"
                        value="{{ old('judul', $download->judul) }}">
                </div>
                <div>
                    <label for="file_download" class="block text-sm font-medium dark:text-neutral-200">Ganti File (Opsional)</label>
                    <p class="text-xs text-gray-500 mb-2">File saat ini: {{ basename($download->path) }}</p>
                    <input type="file" name="file_download" id="file_download" class="w-full dark:text-neutral-200 bg-white dark:bg-neutral-800">
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-sky-600 text-white text-sm font-medium rounded-md
               hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500
               transition-colors">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>

                    Perbarui File
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
