# Setup Admin Panel

## Persyaratan
- PHP 8.1 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Composer

## Langkah-langkah Setup

### 1. Install Dependencies
```bash
composer install
```

### 2. Setup Database MySQL
Buat database MySQL baru:
```sql
CREATE DATABASE admin_panel;
```

### 3. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database MySQL:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

### 4. Jalankan Migrasi Database
```bash
php artisan migrate
```

### 5. Jalankan Seeder untuk Admin Default
```bash
php artisan db:seed --class=AdminSeeder
```

### 6. Jalankan Server Development
```bash
php artisan serve
```

## Akses Admin Panel

- **URL Login**: http://localhost:8000/admin/login
- **Username Default**: admin
- **Password Default**: admin123

## Fitur Keamanan

### Hash Password
- Menggunakan bcrypt dengan 12 rounds untuk hashing password
- Password otomatis di-hash saat disimpan ke database

### Autentikasi
- Session-based authentication
- Middleware protection untuk routes admin
- Auto logout saat session expired

### Tracking Login
- Mencatat waktu login terakhir
- Mencatat IP address login terakhir
- Status aktif/non-aktif admin

## Struktur Database

### Tabel `admins`
- `id` - Primary key
- `username` - Username unik untuk login
- `password` - Password yang di-hash dengan bcrypt
- `is_active` - Status aktif admin (boolean)
- `last_login_at` - Timestamp login terakhir
- `last_login_ip` - IP address login terakhir
- `created_at` - Timestamp pembuatan
- `updated_at` - Timestamp update terakhir

## Keamanan Tambahan

1. **Password Hashing**: Menggunakan Laravel's Hash facade dengan bcrypt
2. **Session Security**: Session driver database dengan enkripsi
3. **CSRF Protection**: Otomatis aktif untuk semua form
4. **Input Validation**: Validasi input pada semua form
5. **Middleware Protection**: Route admin dilindungi middleware khusus

## Customization

### Mengubah Password Default
Edit file `database/seeders/AdminSeeder.php` dan ubah password sebelum menjalankan seeder.

### Menambah Admin Baru
Gunakan tinker Laravel:
```bash
php artisan tinker
```

```php
use App\Models\Admin;

Admin::create([
    'username' => 'admin2',
    'password' => 'password_baru', // akan otomatis di-hash
    'is_active' => true,
]);
```

### Mengubah Tampilan
- File view login: `resources/views/admin/auth/login.blade.php`
- File view dashboard: `resources/views/admin/dashboard.blade.php`

## Troubleshooting

### Error Database Connection
- Pastikan MySQL service berjalan
- Periksa kredensial database di file `.env`
- Pastikan database sudah dibuat

### Error 404 pada Route Admin
- Jalankan `php artisan route:clear`
- Pastikan middleware sudah terdaftar di `bootstrap/app.php`

### Session Error
- Jalankan `php artisan session:table` jika menggunakan database session
- Pastikan tabel sessions sudah ada di database