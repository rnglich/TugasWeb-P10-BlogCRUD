@extends('layouts.app')

@section('title', 'Buat Postingan')

@section('content')
<header class="mb-6 sm:mb-10 animate-fade-in min-w-0">
    <h1 class="font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl tracking-tighter text-black mb-2 sm:mb-4 break-words leading-none">BUAT POSTINGAN</h1>
    <p class="font-mono text-sm sm:text-lg text-black/50 border-l-2 sm:border-l-4 border-black pl-3 sm:pl-4 max-w-2xl break-words">Tulis artikel baru Anda</p>
</header>

<x-alert type="error" :text="$errors->any() ? 'Perbaiki kesalahan di bawah ini sebelum menyimpan.' : null" />

<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="max-w-3xl animate-slide-down min-w-0" novalidate>
    @csrf
    
    <fieldset class="mb-6 sm:mb-8 min-w-0">
        <legend class="sr-only">Detail Postingan</legend>
        
        <div class="mb-4 sm:mb-6 min-w-0">
            <label for="title" class="block font-bold text-base sm:text-lg text-black mb-2 sm:mb-3">JUDUL <span class="text-red-500" aria-hidden="true">*</span></label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
                aria-describedby="title-hint"
                aria-invalid="@error('title') true @enderror"
                placeholder="Masukkan judul postingan..."
                class="w-full px-3 sm:px-5 py-3 sm:py-4 border-2 sm:border-4 border-black bg-white font-mono text-sm sm:text-base
                       @error('title') border-red-500 focus:ring-red-500 @else focus:ring-yellow-400 @enderror
                       focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black
                       transition-colors duration-200"
            >
            @error('title')
                <x-alert type="error" :text="$message" class="mt-3 animate-slide-down" />
            @enderror
            <p id="title-hint" class="font-mono text-xs sm:text-sm text-black/40 mt-2 break-words">Maksimal 255 karakter</p>
        </div>

        <div class="mb-4 sm:mb-6 min-w-0">
            <label for="content" class="block font-bold text-base sm:text-lg text-black mb-2 sm:mb-3">ISI BERITA <span class="text-red-500" aria-hidden="true">*</span></label>
            <textarea
                id="content"
                name="content"
                rows="8"
                required
                aria-describedby="content-hint"
                aria-invalid="@error('content') true @enderror"
                placeholder="Tulis isi postingan di sini..."
                class="w-full px-3 sm:px-5 py-3 sm:py-4 border-2 sm:border-4 border-black bg-white font-mono text-sm sm:text-base resize-y min-h-[180px] sm:min-h-[200px]
                       @error('content') border-red-500 focus:ring-red-500 @else focus:ring-yellow-400 @enderror
                       focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black
                       transition-colors duration-200"
            >{{ old('content') }}</textarea>
            @error('content')
                <x-alert type="error" :text="$message" class="mt-3 animate-slide-down" />
            @enderror
            <p id="content-hint" class="font-mono text-xs sm:text-sm text-black/40 mt-2 break-words">Minimal 10 karakter. Mendukung paragraf panjang.</p>
        </div>

        <div class="mb-4 sm:mb-6 min-w-0">
            <label for="image" class="block font-bold text-base sm:text-lg text-black mb-2 sm:mb-3">GAMBAR FAV</label>
            <div class="border-2 sm:border-4 border-dashed border-black/30 p-6 sm:p-8 text-center relative transition-all duration-200 hover:border-black hover:bg-neutral-50" role="group" aria-labelledby="image-label">
                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/jpeg,image/png,image/gif,image/webp"
                    aria-describedby="image-hint"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                >
                <div class="pointer-events-none">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-black/30 mb-2 sm:mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="font-bold text-sm sm:text-base text-black mb-1 break-words">Seret & lepas atau klik untuk upload</p>
                    <p id="image-hint" class="font-mono text-xs sm:text-sm text-black/40 break-words">JPEG, PNG, GIF, WebP · Maks 2MB</p>
                </div>
            </div>
            @error('image')
                <x-alert type="error" :text="$message" class="mt-3 animate-slide-down" />
            @enderror
            <div id="image-preview" class="mt-3 sm:mt-4 hidden" aria-live="polite"></div>
        </div>
    </fieldset>

    <footer class="flex flex-col sm:flex-row gap-3 sm:gap-4 border-t-2 sm:border-t-4 border-black pt-4 sm:pt-6">
        <button type="submit" class="w-full sm:w-auto sm:flex-none px-6 sm:px-8 py-3 sm:py-4 bg-black text-white font-bold text-base sm:text-lg border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black">
            UPLOAD POSTINGAN
        </button>
        <a href="{{ route('posts.index') }}" class="w-full sm:w-auto sm:flex-none px-6 sm:px-8 py-3 sm:py-4 bg-white text-black font-bold text-base sm:text-lg border-2 sm:border-4 border-black text-center shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black">
            BATAL
        </a>
    </footer>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const dropZone = imageInput.parentElement;
    if (!imageInput || !preview || !dropZone) return;

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                this.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <figure class="relative aspect-video max-h-48 sm:max-h-64 overflow-hidden border-2 sm:border-4 border-black">
                        <img src="${e.target.result}" alt="Pratinjau" class="w-full h-full object-cover">
                        <figcaption class="absolute bottom-0 left-0 right-0 p-2 bg-black/80 text-white text-xs sm:text-sm font-mono truncate">${file.name}</figcaption>
                    </figure>
                `;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
            preview.innerHTML = '';
        }
    });

    ['dragenter', 'dragover'].forEach(event => {
        dropZone.addEventListener(event, e => {
            e.preventDefault();
            dropZone.classList.add('border-yellow-400', 'bg-yellow-50');
        });
    });

    ['dragleave', 'drop'].forEach(event => {
        dropZone.addEventListener(event, e => {
            e.preventDefault();
            dropZone.classList.remove('border-yellow-400', 'bg-yellow-50');
        });
    });

    dropZone.addEventListener('drop', e => {
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            imageInput.files = e.dataTransfer.files;
            imageInput.dispatchEvent(new Event('change'));
        }
    });
});
</script>
@endpush
@endsection