<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | BLOG SOK MISTERIUS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
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
        html, body { overflow-x: hidden; }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="h-full bg-white text-black antialiased overflow-x-hidden">
    <div class="flex flex-col min-h-screen min-w-0">
        <header class="border-b-4 border-black bg-white sticky top-0 z-50 shadow-[0px_4px_0px_0px_rgba(0,0,0,1)]">
            <nav class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4" aria-label="Navigasi utama">
                <div class="flex items-center justify-center min-w-0">
                    <a href="{{ route('welcome') }}" class="flex items-center gap-1.5 sm:gap-3 shrink-0 min-w-0" aria-label="Beranda Blog Sok Misterius">
                        <span class="font-bold text-xl sm:text-3xl tracking-tighter text-black truncate">ANONYMOUS</span>
                        <span class="font-bold text-sm sm:text-xl tracking-tight text-black border-2 border-black px-1.5 sm:px-2 py-0 sm:py-0.5 shrink-0">BLOG</span>
                    </a>
                </div>
            </nav>
        </header>

        <main class="flex-1 max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16 min-w-0" id="main-content">
            <section class="animate-fade-in text-center border-2 sm:border-4 border-black bg-yellow-400 p-6 sm:p-10 md:p-14 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]" aria-labelledby="welcome-heading">
                <p class="inline-block font-mono text-xs sm:text-sm font-bold bg-black text-white px-3 py-1.5 mb-4 sm:mb-6 break-words">ARTIKEL TOP SECRET</p>
                <h1 id="welcome-heading" class="font-bold text-3xl sm:text-5xl md:text-6xl lg:text-7xl tracking-tighter leading-none mb-3 sm:mb-5 break-words">BLOG SOK<br>MISTERIUS</h1>
                <p class="font-mono text-sm sm:text-base md:text-lg text-black/70 max-w-2xl mx-auto mb-6 sm:mb-8 break-words">Bebas posting, tapi jaga adab. Tulis, cari, dan kelola postingan lengkap dengan gambar.</p>
                <div class="flex justify-center">
                    <a href="{{ route('posts.index') }}" class="w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-black text-white font-bold text-base sm:text-lg border-2 sm:border-4 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] sm:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:hover:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-black focus:ring-offset-2 focus:ring-offset-yellow-400 text-center">
                        MASUK SEBAGAI TAMU
                    </a>
                </div>
                <p class="font-mono text-xs sm:text-sm text-black/60 mt-4 sm:mt-5 break-words">Ga perlu login / register — langsung gas ke dashboard utama.</p>
            </section>

            <section class="mt-8 sm:mt-12 animate-fade-in" aria-labelledby="akses-heading">
                <h2 id="akses-heading" class="font-bold text-xl sm:text-2xl md:text-3xl tracking-tight mb-4 sm:mb-6 break-words">PILIH CARA MASUK</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="block border-2 sm:border-4 border-black bg-white p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px]">
                            <p class="font-mono text-xs sm:text-sm text-black/50 mb-2">01</p>
                            <h3 class="font-bold text-lg sm:text-xl mb-2 break-words">MASUK</h3>
                            <p class="text-sm sm:text-base text-black/60 break-words">Sudah punya akun? Masuk untuk mengelola postinganmu.</p>
                        </a>
                    @else
                        <article class="border-2 sm:border-4 border-black/20 bg-neutral-50 p-5 sm:p-6" aria-disabled="true">
                            <p class="font-mono text-xs sm:text-sm text-black/40 mb-2">01</p>
                            <h3 class="font-bold text-lg sm:text-xl mb-2 text-black/40 break-words">MASUK</h3>
                            <p class="text-sm sm:text-base text-black/40 break-words">Segera hadir — untuk sekarang lanjut sebagai tamu.</p>
                        </article>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block border-2 sm:border-4 border-black bg-white p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px]">
                            <p class="font-mono text-xs sm:text-sm text-black/50 mb-2">02</p>
                            <h3 class="font-bold text-lg sm:text-xl mb-2 break-words">DAFTAR</h3>
                            <p class="text-sm sm:text-base text-black/60 break-words">Belum punya akun? Daftar dulu, gratis.</p>
                        </a>
                    @else
                        <article class="border-2 sm:border-4 border-black/20 bg-neutral-50 p-5 sm:p-6" aria-disabled="true">
                            <p class="font-mono text-xs sm:text-sm text-black/40 mb-2">02</p>
                            <h3 class="font-bold text-lg sm:text-xl mb-2 text-black/40 break-words">DAFTAR</h3>
                            <p class="text-sm sm:text-base text-black/40 break-words">Segera hadir — untuk sekarang lanjut sebagai tamu.</p>
                        </article>
                    @endif

                    <a href="{{ route('posts.index') }}" class="block border-2 sm:border-4 border-black bg-black text-white p-5 sm:p-6 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] sm:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] transition-all duration-200 hover:translate-x-[-2px] hover:translate-y-[-2px] sm:hover:translate-x-[-4px] sm:hover:translate-y-[-4px]">
                        <p class="font-mono text-xs sm:text-sm text-white/60 mb-2">03 — TANPA LOGIN</p>
                        <h3 class="font-bold text-lg sm:text-xl mb-2 break-words">MASUK SEBAGAI TAMU</h3>
                        <p class="text-sm sm:text-base text-white/70 break-words">Langsung ke dashboard utama, bebas lihat & posting.</p>
                    </a>
                </div>
            </section>

            <section class="mt-8 sm:mt-12 animate-fade-in" aria-labelledby="fitur-heading">
                <h2 id="fitur-heading" class="font-bold text-xl sm:text-2xl md:text-3xl tracking-tight mb-4 sm:mb-6 break-words">YANG BISA DILAKUKAN DI DASHBOARD UTAMA</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <article class="border-2 sm:border-4 border-black bg-white p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <h3 class="font-bold text-base sm:text-lg mb-2 break-words">CRUD LENGKAP</h3>
                        <p class="text-sm text-black/60 break-words">Buat, baca, ubah, dan hapus postingan dengan validasi.</p>
                    </article>
                    <article class="border-2 sm:border-4 border-black bg-white p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <h3 class="font-bold text-base sm:text-lg mb-2 break-words">PENCARIAN</h3>
                        <p class="text-sm text-black/60 break-words">Cari postingan berdasarkan judul atau konten.</p>
                    </article>
                    <article class="border-2 sm:border-4 border-black bg-white p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <h3 class="font-bold text-base sm:text-lg mb-2 break-words">UPLOAD GAMBAR</h3>
                        <p class="text-sm text-black/60 break-words">Tambahkan gambar unggulan di setiap postingan.</p>
                    </article>
                    <article class="border-2 sm:border-4 border-black bg-white p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <h3 class="font-bold text-base sm:text-lg mb-2 break-words">PAGINASI</h3>
                        <p class="text-sm text-black/60 break-words">Daftar postingan tampil 6 per halaman, rapi di HP & laptop.</p>
                    </article>
                </div>
            </section>
        </main>

        <footer class="border-t-4 border-black bg-white py-6 sm:py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 text-center sm:text-left min-w-0">
                <p class="font-mono text-xs sm:text-sm text-black/50 break-words">BLOG SOK MISTERIUS &copy; {{ date('Y') }}</p>
                <p class="font-bold text-xs sm:text-sm tracking-wide break-words">BEBAS POSTING, TAPI JAGA ADAB</p>
            </div>
        </footer>
    </div>
</body>
</html>