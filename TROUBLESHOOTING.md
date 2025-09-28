# Troubleshooting 404 Not Found

## Langkah-langkah untuk mengatasi masalah 404:

### 1. Pastikan Server Berjalan dengan Benar
```bash
cd /home/bgusrmdn/Dokumen/ras77
php artisan serve --port=8080
```

### 2. Clear All Cache
```bash
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan cache:clear
composer dump-autoload
```

### 3. Test Route Sederhana
Akses URL berikut untuk memastikan server berjalan:
- http://localhost:8080/test (harus menampilkan "Test route works!")
- http://localhost:8080/admin/test (harus menampilkan "Admin test route works!")

### 4. Test Route Admin Login
- http://localhost:8080/admin/login (harus menampilkan halaman login)
- http://localhost:8080/admin (harus redirect ke login)

### 5. Periksa Error Log
Jika masih 404, periksa error log Laravel:
```bash
tail -f storage/logs/laravel.log
```

### 6. Periksa Web Server
Jika menggunakan Apache/Nginx, pastikan:
- Document root mengarah ke folder `public`
- URL rewriting aktif
- File .htaccess dapat dibaca (untuk Apache)

### 7. Periksa Permissions
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## URL yang Harus Bisa Diakses:

1. **Homepage**: http://localhost:8080/
2. **Admin Login**: http://localhost:8080/admin/login
3. **Admin Dashboard**: http://localhost:8080/admin/dashboard (setelah login)

## Kredensial Login Default:
- Username: admin
- Password: admin123

## Jika Masih Bermasalah:

### Cek Route List:
```bash
php artisan route:list | grep admin
```

### Cek Autoload:
```bash
composer dump-autoload -o
```

### Restart Server:
```bash
# Hentikan server (Ctrl+C)
# Jalankan ulang
php artisan serve --port=8080
```

## Catatan Penting:
- Pastikan mengakses melalui port yang benar (8080 atau sesuai yang ditampilkan saat menjalankan `php artisan serve`)
- Jangan akses langsung file PHP, gunakan server Laravel
- Pastikan database MySQL sudah dibuat dan konfigurasi .env benar