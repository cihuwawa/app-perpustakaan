# App Perpustakaan Wawawi

## Deskripsi Aplikasi

**App Perpustakaan** adalah aplikasi berbasis Laravel 12 yang digunakan untuk membantu pengelolaan data perpustakaan. Project ini dibuat sebagai bagian dari praktikum Pemrograman Framework.

Tujuan aplikasi ini adalah membantu proses pengelolaan data perpustakaan, seperti data buku, anggota, kategori buku, serta transaksi peminjaman dan pengembalian buku.

## Teknologi yang Digunakan

- Laravel 12
- PHP 8.2
- Composer
- MySQL
- Git
- GitHub
- Visual Studio Code

## Menjalankan Project Secara Lokal

### 1. Clone Repository

Clone repository project dari GitHub:

```bash
git clone https://github.com/chihuwawa/app-perpustakaan.git
```

### 2. Masuk ke Folder Project

Masuk ke folder project:

```bash
cd app-perpustakaan
```

### 3. Install Dependency

Install dependency Laravel menggunakan Composer:

```bash
composer install
```

### 4. Konfigurasi File Environment

Buka file `.env` yang berada di root project.

Sesuaikan konfigurasi database menjadi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_perpustakaan
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Membuat Database

Buat database MySQL dengan nama:

```text
db_perpustakaan
```

Database dapat dibuat menggunakan MySQL atau phpMyAdmin.

Pada tahap praktikum ini database masih kosong dan belum memiliki tabel. Migration dan pembuatan tabel akan dilakukan pada pertemuan berikutnya.

### 6. Menjalankan Development Server

Jalankan server Laravel dengan perintah:

```bash
php artisan serve
```

Jika berhasil, Laravel akan berjalan pada:

```text
http://127.0.0.1:8000
```

### 7. Membuka Project di Browser

Buka browser dan akses:

```text
http://127.0.0.1:8000
```

Jika halaman Welcome Laravel tampil tanpa error, berarti project berhasil dijalankan secara lokal.

## Konsep MVC

Laravel menggunakan konsep **MVC (Model, View, Controller)** untuk memisahkan bagian-bagian dalam aplikasi.

### Model

**Model** bertugas mengelola data aplikasi dan berhubungan dengan database. Model digunakan untuk mengambil, menyimpan, mengubah, dan menghapus data.

### View

**View** bertugas menampilkan informasi kepada pengguna. Pada Laravel, View biasanya dibuat menggunakan Blade Template dan berisi tampilan atau antarmuka aplikasi.

### Controller

**Controller** bertugas mengatur alur proses aplikasi. Controller menerima request dari pengguna, memproses request tersebut, berkomunikasi dengan Model jika diperlukan, kemudian mengirimkan hasilnya kepada View.

### Perbedaan Model, View, dan Controller

Menurut pemahaman saya, **Model** bertugas mengelola data dan berhubungan dengan database, **View** bertugas menampilkan tampilan kepada pengguna, sedangkan **Controller** bertugas mengatur proses aplikasi. Ketiga bagian tersebut saling berhubungan sehingga data dapat diproses oleh aplikasi dan kemudian ditampilkan kepada pengguna.
