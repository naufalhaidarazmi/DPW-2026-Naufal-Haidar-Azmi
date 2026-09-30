# 🗄️ Jobsheet 8 — Pengembangan SIMPUS-Mini dengan PostgreSQL & PHP

**SIMPUS-Mini** merupakan aplikasi web sederhana untuk mengelola data **buku** dan **anggota perpustakaan**. Aplikasi ini dikembangkan menggunakan **PHP Native dengan PDO** sebagai backend dan **PostgreSQL** sebagai sistem manajemen basis data.

---

## 🚀 Fitur Utama

### 📚 1. Manajemen Data Buku

* Menampilkan daftar buku melalui `list.php`.
* Menambahkan data buku melalui `tambah.php` dan `proses_tambah.php`.
* Melakukan pencarian judul buku secara interaktif.

### 👥 2. Manajemen Data Anggota

* Menampilkan daftar anggota melalui `list.php`.
* Menambahkan anggota baru melalui `tambah.php` dan `proses_tambah.php`.
* Setiap anggota memiliki nomor anggota yang unik.

### 🔐 3. Database & Keamanan

* Menggunakan **PDO PostgreSQL (`pgsql`)** untuk komunikasi dengan database.
* Menggunakan *prepared statement* untuk membantu mencegah **SQL Injection**.
* Struktur tabel dibuat menggunakan **DDL** pada `01_buku_anggota.sql`.

---

## 📁 Struktur Direktori

```text
jobsheet8/
├── anggota/
│   ├── list.php
│   ├── proses_tambah.php
│   └── tambah.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── buku/
│   ├── list.php
│   ├── proses_tambah.php
│   └── tambah.php
├── docs/
│   └── wireframe.md
├── dokumentasi/
│   └── README.md
├── includes/
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
├── sql/
│   └── 01_buku_anggota.sql
└── index.php
```

---

## ⚙️ Instalasi & Menjalankan Aplikasi

### 1. Persiapan Database

Pastikan **PostgreSQL** sudah berjalan, kemudian buat database `simpus_mini`:

```powershell
createdb -U postgres simpus_mini
```

Import struktur tabel menggunakan file DDL:

```powershell
psql -U postgres -d simpus_mini -f sql/01_buku_anggota.sql
```

### 2. Jalankan Local Server

Buka terminal pada folder `jobsheet8`, kemudian jalankan:

```powershell
php -S localhost:8000
```

Setelah server berjalan, buka aplikasi melalui:

```text
http://localhost:8000
```

---

## 🗃️ Database

Database **`simpus_mini`** digunakan untuk menyimpan data aplikasi. Struktur tabel dibuat melalui file:

```text
sql/01_buku_anggota.sql
```

Koneksi database dikelola melalui:

```text
includes/koneksi.php
```

PDO digunakan sebagai penghubung antara aplikasi PHP dan PostgreSQL sehingga proses pengambilan maupun penyimpanan data dapat dilakukan secara terstruktur.

---

## 🔄 Alur Aplikasi

```text
Browser
   ↓
PHP Application
   ↓
PDO PostgreSQL
   ↓
Database SIMPUS-Mini
```

Pengguna dapat mengakses halaman buku maupun anggota, kemudian PHP memproses permintaan dan berkomunikasi dengan PostgreSQL untuk mengambil atau menyimpan data.

---


