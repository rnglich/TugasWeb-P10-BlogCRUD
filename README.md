# TugasWeb-P10-BlogCRUD — Blog CRUD Laravel

Aplikasi blog CRUD untuk tugas Pemrograman Web Pertemuan 10.
Laravel 12 + PHP 8.2 + MySQL.

Alur: `/` (landing welcome) → klik **MASUK SEBAGAI TAMU** → `/posts` (dashboard utama) → kelola postingan. Tanpa login/register.

## Fitur & Pemetaan Kriteria

### Kriteria wajib (8/8)

| # | Kriteria | Implementasi |
|---|----------|--------------|
| 1 | `Route::resource('posts', ...)` + named routes | `routes/web.php:10` — `Route::resource('posts', PostController::class)`. Tambahan `GET / → view('welcome')` bernama `welcome` sebagai landing |
| 2 | 7 method resource | `app/Http/Controllers/PostController.php` — `index, create, store, show, edit, update, destroy` |
| 3 | Layout master `@extends`/`@yield` | `resources/views/layouts/app.blade.php` — `@yield('title')` + `@yield('content')`, semua view posts pakai `@extends('layouts.app')` |
| 4 | Tepat 2 Blade Component | `components/alert.blade.php` (flash + error validasi) dan `components/card.blade.php` (kartu postingan di index). Dipakai via `<x-alert>` dan `<x-card :post="$post">` |
| 5 | Validasi + error per field + `old()` | `store()`/`update()` validasi `title/content/image` dengan pesan Indonesia. Setiap input menampilkan `<x-alert :text="$message">` di bawah field + `old('title')` / `old('content', $post->content)` |
| 6 | Flash success/error | `with('success', 'Postingan berhasil dibuat!/diperbarui!/dihapus!')` di `store/update/destroy`, ditampilkan `<x-alert type="success">` di index |
| 7 | `@csrf` + `@method` | Semua form ada `@csrf`. Form edit pakai `@method('PUT')`, form hapus di show pakai `@method('DELETE')` |
| 8 | Route Model Binding + pagination | Method `show/edit/update/destroy(Post $post)` (binding otomatis). `index()` pakai `latest()->paginate(6)->withQueryString()`, view pakai `{{ $posts->links() }}` |

### Bonus (3/3)

| Bonus | Implementasi |
|-------|--------------|
| Search | `index.blade.php` form `GET` (`name="search"`, placeholder Indonesia). Controller filter `title LIKE %q% OR content LIKE %q%`. Ada tombol HAPUS untuk reset + `withQueryString()` agar pagination menjaga keyword |
| Soft Delete | Migration `$table->softDeletes()`, model pakai `SoftDeletes`. `destroy()` = soft delete (data tidak hilang permanen dari DB) |
| Image Upload | Form `enctype="multipart/form-data"` + input `accept="jpeg,png,gif,webp"` + preview JS + drag-drop. Disimpan `store('posts', 'public')`, ditampilkan via `asset('storage/...')` di `card` dan `show`. Gambar lama dihapus saat update/hapus. Checkbox `remove_image` di edit didukung controller |

### Daftar route

| Method | URI | Nama | Fungsi |
|--------|-----|------|--------|
| GET | `/` | `welcome` | Landing dashboard awal (hero + opsi tamu) |
| GET | `/posts` | `posts.index` | Dashboard utama + search + pagination |
| GET | `/posts/create` | `posts.create` | Form buat |
| POST | `/posts` | `posts.store` | Simpan |
| GET | `/posts/{post}` | `posts.show` | Detail + hapus |
| GET | `/posts/{post}/edit` | `posts.edit` | Form ubah |
| PUT/PATCH | `/posts/{post}` | `posts.update` | Perbarui |
| DELETE | `/posts/{post}` | `posts.destroy` | Hapus (soft delete) |

### Skema tabel `posts`

`database/migrations/2026_10_01_000001_create_posts_table.php`:

- `id` bigint PK
- `title` varchar(255)
- `content` text (tetap `content` mengikuti teks ketentuan bonus "title or content", bukan `body`)
- `image` varchar nullable (path `posts/xxx.jpg` di disk `public`)
- `deleted_at` timestamp nullable (soft delete)
- `timestamps`

## Struktur folder

```text
TugasWeb-P10-BlogCRUD/
├── app/
│   ├── Http/Controllers/PostController.php
│   └── Models/Post.php
├── database/migrations/2026_10_01_000001_create_posts_table.php
├── resources/views/
│   ├── components/alert.blade.php
│   ├── components/card.blade.php
│   ├── layouts/app.blade.php
│   ├── posts/create.blade.php
│   ├── posts/edit.blade.php
│   ├── posts/index.blade.php
│   ├── posts/show.blade.php
│   └── welcome.blade.php      ← landing (di luar ketentuan, penunjuk ke dashboard utama)
├── routes/web.php
└── README.md
```

## Cara instalasi (dari GitHub)

```bash
git clone https://github.com/USERNAME/TugasWeb-P10-BlogCRUD.git
cd TugasWeb-P10-BlogCRUD
composer install
cp .env.example .env    # Windows: copy .env.example .env
php artisan key:generate
```

Buat database kosong di MySQL (mis. via phpMyAdmin):

```sql
CREATE DATABASE blog_crud_db;
```

Sesuaikan `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_crud_db
DB_USERNAME=root
DB_PASSWORD=
```

Lanjut:

```bash
php artisan migrate:fresh
php artisan storage:link   # wajib agar gambar tampil (membuat public/storage)
php artisan serve           # buka http://127.0.0.1:8000
```

> Ganti `USERNAME` dengan username GitHub kamu. Jangan commit file `.env` (sudah ada di `.gitignore` bawaan Laravel).

## Cara push ke GitHub

```bash
cd TugasWeb-P10-BlogCRUD
git init
git add .
git commit -m "TugasWeb P10 BlogCRUD"
git branch -M main
git remote add origin https://github.com/USERNAME/TugasWeb-P10-BlogCRUD.git
git push -u origin main
```

## Cara pakai

1. Buka `http://127.0.0.1:8000/` → landing kuning **BLOG SOK MISTERIUS**.
2. Klik **MASUK SEBAGAI TAMU** (tengah, satu-satunya tombol) → masuk `/posts`.
3. Di dashboard utama: cari via kolom search → **CARI** (atau **HAPUS** untuk reset), klik **Baca Selengkapnya** untuk detail.
4. Buat baru: di dashboard utama klik header **+ POSTINGAN BARU** — isi Judul/Konten/Gambar → **TERBITKAN POSTINGAN**. Gagal validasi → pesan Indonesia muncul di bawah field + input lama dipertahankan.
5. Di detail: **UBAH** untuk edit (gambar lama tampil + opsi hapus gambar), **HAPUS** untuk soft delete (konfirmasi dulu), **KEMBALI KE DAFTAR** untuk kembali.

## Desain & teknis

- **Bold Brutalist**: border hitam tebal (`border-2 sm:border-4`), hard shadow (`shadow-[4px_4px_0px...]` → `8px` di desktop), hover geser, aksen kuning `yellow-400`, font Space Grotesk + Geist Mono via Tailwind CDN.
- **Responsif mobile-first**: padding/teks/border/shadow naik bertahap (`px-4 sm:px-6 lg:px-8`, `text-3xl sm:text-5xl lg:text-7xl`, `grid-cols-1 md:grid-cols-2 lg:grid-cols-3`, tombol `w-full sm:w-auto`), anti overflow (`min-w-0`, `break-words`, `overflow-x-hidden`).
- **Semantik**: `header/nav/main/article/section/footer/figure/figcaption/time`, tanpa `<div>` berlebihan.
- **Stack**: Laravel 12, PHP 8.2, MySQL (`blog_crud_db`), Tailwind via CDN (tanpa build Vite), upload di `storage/app/public/posts`.
