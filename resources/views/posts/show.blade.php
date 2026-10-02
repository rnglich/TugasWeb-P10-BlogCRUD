@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="max-w-4xl animate-fade-in min-w-0">
    <header class="mb-6 sm:mb-8 min-w-0">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6 overflow-x-auto">
            <ol class="flex items-center gap-1.5 sm:gap-2 font-mono text-xs sm:text-sm text-black/50 whitespace-nowrap">
                <li><a href="{{ route('posts.index') }}" class="hover:text-black transition-colors">POSTINGAN</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page" class="text-black font-bold truncate max-w-[180px] sm:max-w-[300px] md:max-w-none">{{ Str::limit($post->title, 40) }}</li>
            </ol>
        </nav>
        
        <h1 class="font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl tracking-tight text-black leading-tight mb-3 sm:mb-4 break-words">{{ $post->title }}</h1>
        
        <div class="flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-2 sm:gap-4 border-t-2 sm:border-t-4 border-black pt-3 sm:pt-4 min-w-0">
            <time datetime="{{ $post->created_at->toIso8601String() }}" class="font-mono text-sm sm:text-lg text-black/60 break-words">
                Diterbitkan {{ $post->created_at->translatedFormat('d F Y') }}
            </time>
            @if($post->updated_at->diffInMinutes($post->created_at) > 1)
                <span class="font-mono text-xs sm:text-sm text-black/40 sm:border-l-2 border-black sm:pl-3 pt-2 sm:pt-0 border-t sm:border-t-0 border-black/10 break-words">
                    Diperbarui {{ $post->updated_at->diffForHumans() }}
                </span>
            @endif
        </div>
    </header>

    @if($post->image)
        <figure class="mb-6 sm:mb-10 relative aspect-video lg:aspect-[16/9] overflow-hidden border-2 sm:border-4 border-black">
            <img 
                src="{{ asset('storage/' . $post->image) }}" 
                alt="{{ $post->title }}"
                class="w-full h-full object-cover"
            >
        </figure>
    @endif

    <div class="border-t-2 sm:border-t-4 border-black pt-6 sm:pt-8 min-w-0">
        <div class="whitespace-pre-wrap break-words leading-relaxed text-base sm:text-lg text-black/90">{{ $post->content }}</div>
    </div>

    <footer class="mt-8 sm:mt-12 border-t-2 sm:border-t-4 border-black pt-6 sm:pt-8 flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
            <a href="{{ route('posts.edit', $post) }}" class="w-full sm:w-auto px-6 py-3 bg-yellow-400 text-black font-bold text-sm sm:text-base text-center border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black whitespace-nowrap">
                UBAH
            </a>
            <a href="{{ route('posts.index') }}" class="w-full sm:w-auto px-6 py-3 bg-white text-black font-bold text-sm sm:text-base text-center border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black whitespace-nowrap">
                KEMBALI KE DAFTAR
            </a>
        </div>
        
        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Hapus postingan ini secara permanen? Tindakan ini tidak dapat dibatalkan.')" class="w-full sm:w-auto">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-red-500 text-white font-bold text-sm sm:text-base border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-red-500 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black whitespace-nowrap">
                HAPUS
            </button>
        </form>
    </footer>
</article>
@endsection