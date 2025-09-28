# Setup Admin Panel - Menggunakan Database Laravel

## Langkah-langkah Setup

### 1. Pastikan Database MySQL Berjalan
Pastikan MySQL service aktif dan database `laravel` sudah dibuat:
```sql
CREATE DATABASE laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Konfigurasi Database
File `.env` sudah dikonfigurasi untuk menggunakan database `laravel`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Jalankan Migrasi
```bash
php artisan migrate
```

### 4. Jalankan Seeder untuk Membuat Admin User
```bash
php artisan db:seed
```

### 5. Jalankan Server
```bash
php artisan serve --port=8080
```

## Akses Admin Panel

- **URL Login**: http://localhost:8080/admin/login
- **Email Admin**: admin@admin.com
- **Password**: admin123

## Perubahan yang Dilakukan

### 1. Menggunakan Tabel `users` Laravel
- Menambahkan field `is_admin` untuk menandai user sebagai admin
- Menambahkan field `last_login_at` dan `last_login_ip` untuk tracking
- Tidak menggunakan tabel `admins` terpisah

### 2. Model User Diperluas
- Menambahkan method `isAdmin()` untuk cek status admin
- Menambahkan method `updateLastLogin()` untuk tracking login
- Password otomatis di-hash dengan Laravel's built-in hashing

### 3. Login Menggunakan Email
- Field login menggunakan email, bukan username
- Validasi admin berdasarkan field `is_admin = true`

### 4. Session Management
- Menggunakan session Laravel untuk menyimpan data admin
- Middleware untuk proteksi route admin

## Struktur Database

### Tabel `users` (Modified)
- `id` - Primary key
- `name` - Nama lengkap user
- `email` - Email untuk login (unique)
- `password` - Password yang di-hash
- `is_admin` - Boolean untuk status admin
- `last_login_at` - Timestamp login terakhir
- `last_login_ip` - IP address login terakhir
- `email_verified_at` - Timestamp verifikasi email
- `remember_token` - Token untuk remember me
- `created_at` - Timestamp pembuatan
- `updated_at` - Timestamp update

## Menambah Admin Baru

### Via Tinker:
```bash
php artisan tinker
```

```php
use App\Models\User;

User::create([
    'name' => 'Admin Baru',
    'email' => 'admin2@admin.com',
    'password' => 'password123',
    'is_admin' => true,
]);
```

### Via Database:
```sql
INSERT INTO users (name, email, password, is_admin, created_at, updated_at) 
VALUES ('Admin Baru', 'admin2@admin.com', '$2y$12$hash_password_here', 1, NOW(), NOW());
```

## Keamanan

1. **Password Hashing**: Menggunakan Laravel's built-in bcrypt hashing
2. **Session Security**: Session disimpan di database dengan enkripsi
3. **CSRF Protection**: Otomatis aktif untuk semua form
4. **Admin Validation**: Hanya user dengan `is_admin = true` yang bisa login
5. **Input Validation**: Validasi email dan password

## Troubleshooting

### Database Connection Error
- Pastikan MySQL service berjalan
- Pastikan database `laravel` sudah dibuat
- Periksa kredensial di file `.env`

### 404 Error
- Pastikan server Laravel berjalan: `php artisan serve --port=8080`
- Clear cache: `php artisan route:clear && php artisan config:clear`

### Login Gagal
- Pastikan user memiliki `is_admin = true`
- Pastikan email dan password benar
- Cek di database apakah user admin sudah dibuat