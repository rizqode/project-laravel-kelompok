<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🧾 Project Laravel Kelompok – Aplikasi Studio Foto

Aplikasi Studio Foto adalah sistem manajemen layanan foto studio berbasis web yang mempermudah pengelolaan paket foto dan data pemesanan secara efisien. Aplikasi ini dibangun dengan **Laravel** dan **Filament**, serta menerapkan manajemen akses berbasis role (`admin` dan `user`).

---

## 🛠️ Tool Requirements

Sebelum menjalankan proyek ini, pastikan sistem kamu telah memiliki:

| Tool            | Minimum Version | Keterangan                         |
| --------------- | --------------- | ---------------------------------- |
| PHP             | 8.2             | Laravel 12 membutuhkan PHP ≥ 8.1   |
| Composer        | 2.x             | Untuk mengelola dependency Laravel |
| MySQL / MariaDB | 5.7+ / 10.2+    | Untuk menyimpan data aplikasi      |
| Git             | Latest          | Untuk clone dan push repository    |

---

## 👥 Pembagian Tugas

| Nama Anggota            | Fitur yang Dikerjakan                                                               |
| ----------------------- | ----------------------------------------------------------------------------------- |
| Muhammad Rizqi          | Setup kerangka Laravel                                                              |
| Pasha Herdiansyah       | Fitur autentikasi (login & register)                                                |
| Denis Nasrul Syam       | CRUD Produk (tambah, edit, hapus, lihat), upload gambar ke storage, DataTables Ajax |
| Nadhira putri dwicahyani           | Dashboard admin dan user, pembatasan akses halaman berdasarkan role pengguna        |

---

## ⚙️ Cara Install & Menjalankan Proyek

### 1. Clone Repository

Buka software **GIT** lalu jalankan perintah berikut:

```bash
git clone https://github.com/Dina-Nurcahyani/project-laravel-kelompok.git

cd project-laravel-kelompok
```

### 2. Install Dependency Laravel

```bash
composer install
```

### 3. Copy File .env & Generate App Key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Atur Konfigurasi Database

Buka folder project yang sudah diclone, cari file yang namanya **.env** lalu edit bagian dibawah ini:

```bash
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_studiofoto
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
```

Lalu buat database db_studiofoto di MySQL.

### 5. Jalankan Migrasi

Buka kembali software **GIT** lalu jalankan perintah berikut:

```bash
php artisan migrate
php artisan db:seed --class=RoleSeeder
```

### 6. Link Storage (untuk menampilkan gambar)

```bash
php artisan storage:link
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Buka di browser: http://127.0.0.1:8000

## 🔐 Role Akses

| Role  | Keterangan                            |
| ----- | ------------------------------------- |
| admin | akses penuh (dashboard, produk, user) |
| user  | hanya melihat data produk             |
