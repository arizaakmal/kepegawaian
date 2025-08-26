# Aplikasi Kepegawaian

Aplikasi sederhana untuk manajemen data kepegawaian menggunakan PHP Native dan MySQL dengan Bootstrap untuk tampilan.

## Persyaratan Sistem

- PHP 7.4 atau lebih baru
- MySQL 5.7 atau lebih baru
- Web Server (Apache/Nginx)
- **Local Development Environment**: XAMPP, Laragon, WAMP, MAMP, atau sejenisnya

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/arizaakmal/kepegawaian.git
cd kepegawaian
```

### 2. Setup Database

1. Buka **phpMyAdmin** di `http://localhost/phpmyadmin`
2. Import file `database.sql`:
   - Klik tab **"SQL"**
   - Copy isi file `database.sql` dan paste
   - Klik **"Go"** atau **"Kirim"**

### 3. Konfigurasi Database

Edit file `config/database.php` sesuai pengaturan MySQL Anda:

```php
$host = 'localhost';
$user = 'root';        // Username MySQL
$pass = '';            // Password MySQL
$db   = 'kepegawaian'; // Nama database
```

### 4. Jalankan Aplikasi

1. Pastikan local development environment sudah running (XAMPP/Laragon/WAMP/MAMP)
2. Akses aplikasi di browser:
   ```
   http://localhost/kepegawaian/public/
   ```
