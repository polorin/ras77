# Build & Test

- Install dependencies: `composer install && npm install`
- Copy env file: `cp .env.example .env` lalu update sesuai kebutuhan
- Generate app key: `php artisan key:generate`
- Jalankan migration: `php artisan migrate --seed`
- Jalankan server dev: `php artisan serve`
- Jalankan Vite dev server: `npm run dev`
- Build assets untuk production: `npm run build`
- Testing (PHPUnit): `php artisan test`

# Architecture Overview

- Framework: Laravel 12 (PHP 8.2+)
- Frontend: Blade templates + TailwindCSS + Alpine.js
- Build tool: Vite (untuk bundling JS/CSS)
- Routes: `routes/web.php` untuk web, `routes/api.php` untuk API
- Controllers: `app/Http/Controllers`
- Models: `app/Models`
- Views: `resources/views`
- Assets (CSS/JS): `resources/css`, `resources/js`

# Security

- Jangan commit `.env`
- Gunakan `.env` untuk variabel sensitif: `DB_CONNECTION`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `APP_KEY`
- API authentication default: Laravel Sanctum/Passport (jika digunakan)
- Semua request lewat CSRF protection middleware

# Git Workflows

1. Branch dari `main` → `feature/<nama>` atau `fix/<nama>`
2. Commit convention:
   - `feat: tambah fitur baru`
   - `fix: perbaiki bug`
   - `chore: update dependencies`
   - `style: update styling`
3. PR harus lulus:
   - `php artisan test`
   - `npm run build` tanpa error
4. Jangan force push ke `main`

# Conventions & Patterns

- Blade views pakai snake_case file names → contoh: `dashboard.blade.php`
- Controllers pakai PascalCase → contoh: `UserController`
- Routes gunakan RESTful conventions
- CSS utility pakai Tailwind (hindari inline CSS)
- Gunakan Laravel facades hanya untuk helper sederhana, prefer dependency injection
- Pisahkan logic ke Service class jika mulai kompleks
