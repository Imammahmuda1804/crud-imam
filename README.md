# MyLibrary - Aplikasi Manajemen Perpustakaan

Selamat datang di MyLibrary! Ini adalah aplikasi web sederhana yang dibangun dengan Laravel untuk mengelola koleksi buku, penulis, dan kategori di perpustakaan digital Anda.

![Pratinjau Aplikasi](https://drive.google.com/uc?export=view&id=1dh10CfsfAKUrljb0jCOsOJ5i-xThXtg6)

---
## ✨ Fitur Utama

* **Manajemen Buku**: Tambah, lihat, edit, dan hapus (CRUD) data buku lengkap dengan sampul, deskripsi, dan tahun terbit.
* **Manajemen Penulis**: CRUD untuk data penulis, termasuk foto dan biografi singkat.
* **Manajemen Kategori**: CRUD untuk kategori buku.
* **Desain Modern & Responsif**: Antarmuka yang bersih dan modern dibangun dengan Tailwind CSS, dapat diakses di berbagai perangkat.
* **Interaksi Dinamis**: Tampilan daftar yang interaktif dengan efek hover, modal untuk detail, dan fungsionalitas "Read More".

---
## 🛠️ Teknologi yang Digunakan

* **Backend**: Laravel 12
* **Frontend**: Blade, Tailwind CSS, JavaScript
* **Database**: MySQL
* **Server**: PHP Development Server

---
## 🚀 Panduan Instalasi & Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

### 1. Prasyarat

Pastikan perangkat Anda sudah terinstal software berikut:
* PHP (versi 8.2 atau lebih baru)
* Composer
* Database Server (contoh: MySQL, MariaDB)

### 2. Instalasi

**a. Clone Repository**
Buka terminal atau Git Bash, lalu clone repository ini ke direktori lokal Anda.
```bash
git clone [https://github.com/Imammahmuda1804/crud-imam.git](https://github.com/Imammahmuda1804/crud-imam.git)
cd crud-imam
```

**b. Instal Dependensi**
Instal semua dependensi PHP yang dibutuhkan menggunakan Composer.
```bash
composer install
```

**c. Konfigurasi Lingkungan**
Salin file `.env.example` menjadi `.env`. File ini akan berisi semua konfigurasi aplikasi Anda.
```bash
cp .env.example .env
```
Setelah itu, generate kunci aplikasi (APP_KEY) yang unik.
```bash
php artisan key:generate
```

**d. Konfigurasi Database**
Buka file `.env` yang baru saja Anda buat dan sesuaikan konfigurasi database berikut dengan pengaturan lokal Anda.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_perpustakaan # Ganti dengan nama database Anda
DB_USERNAME=root # Ganti dengan username database Anda
DB_PASSWORD= # Ganti dengan password database Anda
```
> Pastikan Anda sudah membuat database dengan nama yang sesuai di server database Anda (misalnya, melalui phpMyAdmin).

**e. Migrasi & Seeding Database**
Jalankan migrasi untuk membuat semua tabel yang diperlukan, lalu jalankan seeder untuk mengisi tabel dengan data awal.
```bash
php artisan migrate:fresh --seed
```

**f. Buat Symbolic Link untuk Storage**
Perintah ini sangat penting agar gambar sampul buku dan foto penulis yang Anda unggah dapat diakses secara publik.
```bash
php artisan storage:link
```

### 3. Menjalankan Aplikasi

Setelah semua langkah instalasi selesai, jalankan server development lokal Laravel.
```bash
php artisan serve
```
Aplikasi Anda sekarang akan berjalan dan dapat diakses melalui browser di alamat:
**http://127.0.0.1:8000**

---
## 📝 Kontribusi

Kontribusi, isu, dan permintaan fitur sangat kami hargai. Jangan ragu untuk membuat *pull request* atau membuka *issue* baru.

Dibuat dengan ❤️ oleh **Imam Mahmuda**.
