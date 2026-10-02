@props(['post'])

<article class="group relative border-2 sm:border-4 border-black bg-white 
            shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] 
            transition-all duration-300 ease-out 
            hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-8px] sm:hover:translate-y-[-8px] 
            hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[16px_16px_0px_0px_rgba(0,0,0,1)]
            overflow-hidden flex flex-col min-w-0">
    
    @if($post->image)
        <figure class="relative aspect-video overflow-hidden shrink-0">
            <img 
                src="{{ asset('storage/' . $post->image) }}" 
                alt="{{ $post->title }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
            >
        </figure>
    @else
        <figure class="aspect-video bg-neutral-100 border-b-2 sm:border-b-4 border-black flex items-center justify-center shrink-0">
            <svg class="w-12 h-12 sm:w-16 sm:h-16 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </figure>
    @endif

    <header class="p-3 sm:p-5 border-b-2 sm:border-b-4 border-black bg-yellow-400 shrink-0">
        <h2 class="font-bold text-lg sm:text-xl md:text-2xl tracking-tight text-black line-clamp-2 break-words leading-tight">{{ $post->title }}</h2>
    </header>

    <div class="p-3 sm:p-5 flex flex-col flex-1 min-w-0">
        <p class="text-sm sm:text-base text-black/70 leading-relaxed mb-3 sm:mb-4 line-clamp-3 break-words flex-1">{{ Str::limit($post->content, 150) }}</p>
        
        <footer class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-3 border-t-2 border-black pt-3 sm:pt-4 mt-auto">
            <time datetime="{{ $post->created_at->toIso8601String() }}" class="text-xs sm:text-sm font-mono text-black/50 shrink-0 order-2 sm:order-1">
                {{ $post->created_at->translatedFormat('d M Y') }}
            </time>
            
            <a 
                href="{{ route('posts.show', $post) }}"
                class="order-1 sm:order-2 inline-flex items-center justify-center gap-1.5 sm:gap-2 w-full sm:w-auto px-3 sm:px-4 py-2 sm:py-2 bg-black text-white font-bold text-xs sm:text-sm
                       border-2 sm:border-4 border-black
                       shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]
                       transition-all duration-200
                       hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] 
                       hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]
                       focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black"
            >
                Baca Selengkapnya
                <svg class="w-3 h-3 sm:w-4 sm:h-4 transition-transform group-hover:translate-x-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </footer>
    </div>
</article>