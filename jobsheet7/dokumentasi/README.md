# 🐘 Jobsheet 7 — PHP Fundamentals: Server-Side Rendering, Includes, Session & Form Processing

Dokumentasi ini berisi hasil praktikum **Desain Pemrograman Web (DPW)** pada **Jobsheet 7** yang membahas dasar PHP, *server-side rendering*, modularisasi template, pemrosesan form, validasi sisi server, serta pengelolaan session.

## 👤 Identitas Mahasiswa

| Keterangan | Detail             |
| :--------- | :----------------- |
| **Nama**   | Naufal Haidar Azmi |
| **Kelas**  | 2F/TI              |
| **Absen**  | 24                 |
| **NIM**    | 254107020163       |

---

## 📁 Struktur Direktori

```text
jobsheet7/
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
│   └── header.php
└── index.php
```

---

## 💡 Konsep Dasar PHP

### 1. Server-Side Rendering

PHP diproses oleh **server** sebelum menghasilkan HTML yang dikirim ke browser. Dengan demikian, kode dan logika PHP tidak ditampilkan secara langsung kepada pengguna.

### 2. Sintaks & Variabel

* Kode PHP ditulis menggunakan `<?php ... ?>`.
* Variabel diawali dengan simbol `$`.
* Setiap pernyataan diakhiri dengan `;`.
* Output dapat ditampilkan menggunakan `echo` atau `<?= $variabel ?>`.

### 3. Modularisasi Template

Folder `includes/` digunakan untuk menerapkan prinsip **Don't Repeat Yourself (DRY)** dengan memisahkan komponen yang digunakan berulang, seperti `header.php` dan `footer.php`.

Penggunaan `include` dan `__DIR__` membantu mengelola pemanggilan file serta path asset dari berbagai lokasi halaman.

Variabel `$base` digunakan untuk menyesuaikan path secara otomatis sehingga navigasi, CSS, dan JavaScript tetap dapat digunakan pada halaman dengan tingkat folder yang berbeda.

---

## 🔄 Form Processing & Session

### 📤 Pemrosesan Form

Data form dikirim menggunakan metode `POST` dan diterima melalui `$_POST`. Input dibersihkan menggunakan `trim()` sebelum diproses.

### ✅ Validasi Server-Side

PHP melakukan validasi untuk memastikan data yang diterima sesuai aturan, seperti:

* Field wajib diisi.
* Nilai numerik harus valid.
* Tahun berada pada rentang **1900–2026**.
* Stok tidak boleh kurang dari `0`.

### 🔐 Session & PRG Pattern

Data sementara disimpan menggunakan:

```php
$_SESSION['buku']
$_SESSION['anggota']
```

Setelah proses berhasil, digunakan pola **Post/Redirect/Get (PRG)** dengan `header()` dan `exit` untuk mencegah pengiriman form berulang saat halaman di-*refresh*.

Sistem juga menggunakan **Flash Message** melalui `$_SESSION['flash']` untuk menampilkan pesan keberhasilan atau kesalahan satu kali.

---

## 🎨 Styling Flash Message

Pada `assets/css/style.css` ditambahkan beberapa class:

| Class            | Fungsi                          |
| :--------------- | :------------------------------ |
| `.flash`         | Styling dasar pesan             |
| `.flash-success` | Pesan keberhasilan              |
| `.flash-error`   | Pesan kesalahan atau peringatan |

---