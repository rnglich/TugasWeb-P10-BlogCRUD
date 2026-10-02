<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Blog CRUD') | BLOG SOK MISTERIUS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'neon-yellow': '#EAB308',
                        'neon-green': '#22C55E',
                    },
                    animation: {
                        'slide-down': 'slideDown 0.3s ease-out',
                        'fade-in': 'fadeIn 0.3s ease-out',
                    },
                    keyframes: {
                        slideDown: {
                            '0%': { opacity: '0', transform: 'translateY(-10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Geist+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Space Grotesk', sans-serif; }
        .font-mono { font-family: 'Geist Mono', monospace; }
        html { overflow-x: hidden; }
        body { overflow-x: hidden; }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="h-full bg-white text-black antialiased overflow-x-hidden">
    <div class="flex flex-col min-h-screen min-w-0">
        <header class="border-b-4 border-black bg-white sticky top-0 z-50 shadow-[0px_4px_0px_0px_rgba(0,0,0,1)]">
            <nav class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4" aria-label="Navigasi utama">
                <div class="flex items-center justify-between gap-2 sm:gap-4 min-w-0">
                    <a href="{{ route('posts.index') }}" class="flex items-center gap-1.5 sm:gap-3 shrink-0 min-w-0" aria-label="Beranda Blog Brutalis">
                        <span class="font-bold text-xl sm:text-3xl tracking-tighter text-black truncate">ANONYMOUS</span>
                        <span class="font-bold text-sm sm:text-xl tracking-tight text-black border-2 border-black px-1.5 sm:px-2 py-0 sm:py-0.5 shrink-0">BLOG</span>
                    </a>
                    <a href="{{ route('posts.create') }}" class="shrink-0 px-3 sm:px-5 py-2 sm:py-2.5 bg-black text-white font-bold text-xs sm:text-sm lg:text-base border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-yellow-400 focus:ring-offset-1 sm:focus:ring-offset-2 focus:ring-offset-black whitespace-nowrap">
                        <span class="hidden xs:inline">+ </span>POSTINGAN<span class="hidden sm:inline"> BARU</span><span class="sm:hidden">+</span>
                    </a>
                </div>
            </nav>
        </header>

        <main class="flex-1 max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10 min-w-0" id="main-content">
            @yield('content')
        </main>

        <footer class="border-t-4 border-black bg-white py-6 sm:py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 text-center sm:text-left min-w-0">
                <p class="font-mono text-xs sm:text-sm text-black/50 break-words">BLOG SOK MISTERIUS &copy; {{ date('Y') }}</p>
                <p class="font-bold text-xs sm:text-sm tracking-wide break-words">BEBAS POSTING, TAPI JAGA ADAB</p>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>