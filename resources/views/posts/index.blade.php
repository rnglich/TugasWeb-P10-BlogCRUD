@extends('layouts.app')

@section('title', 'Semua Postingan')

@section('content')
<header class="mb-6 sm:mb-8 md:mb-10 animate-fade-in min-w-0">
    <h1 class="font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl tracking-tighter text-black mb-2 sm:mb-4 break-words leading-none">POSTINGAN</h1>
    <p class="font-mono text-sm sm:text-base md:text-lg text-black/50 border-l-2 sm:border-l-4 border-black pl-3 sm:pl-4 max-w-2xl break-words">Semua artikel yang udah dipost</p>
</header>

<x-alert type="success" />

<form method="GET" action="{{ route('posts.index') }}" class="mb-6 sm:mb-10 animate-slide-down min-w-0" role="search">
    <label for="search" class="sr-only">Cari postingan</label>
    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 max-w-xl">
        <div class="relative flex-1 min-w-0">
            <input
                type="search"
                id="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari berdasarkan judul atau konten..."
                class="w-full px-3 sm:px-5 py-3 sm:py-4 border-2 sm:border-4 border-black bg-white font-mono text-sm sm:text-base
                       placeholder:text-black/30
                       focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black"
                aria-describedby="search-hint"
            >
        </div>
        <div class="flex gap-2 sm:gap-3 shrink-0">
            <button type="submit" class="flex-1 sm:flex-none px-4 sm:px-6 py-3 sm:py-4 bg-black text-white font-bold text-sm sm:text-base border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black whitespace-nowrap">
                CARI
            </button>
            @if(request('search'))
                <a href="{{ route('posts.index') }}" class="flex-1 sm:flex-none px-4 sm:px-6 py-3 sm:py-4 bg-yellow-400 text-black font-bold text-sm sm:text-base border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black whitespace-nowrap text-center">
                    HAPUS
                </a>
            @endif
        </div>
    </div>
    <p id="search-hint" class="font-mono text-xs sm:text-sm text-black/40 mt-2 break-words">Hasil akan diperbarui setelah menekan tombol cari.</p>
</form>

@if($posts->isEmpty())
    <article class="border-2 sm:border-4 border-black p-6 sm:p-8 md:p-12 text-center bg-neutral-50 animate-fade-in">
        <svg class="w-16 h-16 sm:w-20 sm:h-20 mx-auto text-neutral-400 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h2 class="font-bold text-xl sm:text-2xl text-black mb-2 break-words">{{ request('search') ? 'Tidak ada hasil' : 'Belum ada postingan' }}</h2>
        <p class="text-sm sm:text-base text-black/60 mb-4 sm:mb-6 max-w-md mx-auto break-words">{{ request('search') ? 'Coba ubah kata kunci pencarian Anda' : 'Buat postingan pertama Anda untuk memulai' }}</p>
        @unless(request('search'))
            <a href="{{ route('posts.create') }}" class="inline-flex items-center justify-center gap-2 px-5 sm:px-6 py-2.5 sm:py-3 bg-black text-white font-bold text-sm sm:text-base border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] w-full sm:w-auto">
                BUAT POSTINGAN PERTAMA
                <svg class="w-4 h-4 sm:w-5 sm:h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
            </a>
        @endunless
    </article>
@else
    <section aria-labelledby="posts-heading" class="animate-fade-in min-w-0">
        <h2 id="posts-heading" class="sr-only">Daftar Postingan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8" role="list">
            @foreach($posts as $post)
                <x-card :post="$post" />
            @endforeach
        </div>

        <div class="mt-6 sm:mt-10 overflow-x-auto">
            {{ $posts->links() }}
        </div>
    </section>
@endif
@endsection