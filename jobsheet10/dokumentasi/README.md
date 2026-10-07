# 🔐 Jobsheet 10 — Autentikasi & Manajemen Sesi

Jobsheet 10 merupakan pengembangan lanjutan **SIMPUS-Mini** dengan menambahkan sistem **Autentikasi dan Manajemen Sesi**. Fitur yang diterapkan meliputi **Registrasi, Login, Logout, proteksi halaman, keamanan password**, serta **Navbar Dinamis** berdasarkan status login pengguna.

---

## 📌 Konsep & Fitur Utama

### 👤 1. Autentikasi & Otorisasi

**Autentikasi** digunakan untuk memverifikasi identitas pengguna melalui username dan password.

**Otorisasi** digunakan untuk menentukan apakah pengguna memiliki izin untuk mengakses halaman tertentu.

```text
Autentikasi → "Siapa kamu?"
Otorisasi   → "Apa yang boleh kamu akses?"
```

Pada aplikasi, otorisasi diterapkan melalui `includes/auth.php` sebagai **Guard Clause** untuk melindungi halaman yang membutuhkan login.

---

### 🔒 2. Keamanan Password

Password pengguna tidak disimpan dalam bentuk *plaintext*. Saat registrasi, password diubah menjadi hash menggunakan:

```php
password_hash($password, PASSWORD_DEFAULT);
```

Saat login, password diverifikasi menggunakan:

```php
password_verify($password, $hash);
```

Database menggunakan kolom `VARCHAR(255)` untuk menyimpan hasil hash password.

---

### 🧠 3. Manajemen Session

Setelah login berhasil, informasi pengguna disimpan ke dalam `$_SESSION`, seperti:

```php
$_SESSION['user_id']
$_SESSION['nama']
$_SESSION['role']
```

Session digunakan untuk mempertahankan status login pengguna selama mengakses aplikasi.

Saat logout, session dihancurkan menggunakan:

```php
session_destroy();
```

Pengecekan `session_status()` digunakan untuk mencegah pemanggilan `session_start()` secara berulang.

---

### 🛡️ 4. Proteksi Halaman dengan `auth.php`

File `includes/auth.php` digunakan untuk memastikan halaman tertentu hanya dapat diakses oleh pengguna yang sudah login.

```php
require 'includes/auth.php';
```

File tersebut harus dipanggil **sebelum output HTML** agar proses pengalihan menggunakan `header()` dapat berjalan dengan baik.

Proteksi hanya bergantung pada data session sehingga tetap dapat melakukan pengecekan status login tanpa harus melakukan query database setiap kali halaman dibuka.

---

### 🧭 5. Navbar Dinamis

Navbar menyesuaikan tampilannya berdasarkan status login pengguna.

| Status         | Menu yang Ditampilkan                       |
| :------------- | :------------------------------------------ |
| 👤 Tamu        | Login                                       |
| 🔐 Sudah Login | Nama pengguna, Tambah Buku, Anggota, Logout |

Pengecekan dilakukan menggunakan variabel seperti `$sudahLogin` pada `header.php`.

---

## 👥 Pembagian Hak Akses

| Halaman           | Akses       | Keterangan                      |
| :---------------- | :---------- | :------------------------------ |
| `index.php`       | 🌐 Publik   | Dapat diakses tanpa login       |
| `buku/list.php`   | 🌐 Publik   | Katalog buku dapat dilihat Tamu |
| `buku/tambah.php` | 🔒 Terkunci | Wajib login                     |
| `buku/edit.php`   | 🔒 Terkunci | Wajib login                     |
| `buku/hapus.php`  | 🔒 Terkunci | Wajib login                     |
| `anggota/*`       | 🔒 Terkunci | Seluruh modul membutuhkan login |

---

## 📁 Struktur Direktori

```text
jobsheet10/
├── index.php
├── anggota/
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── auth/
│   ├── login.php
│   ├── logout.php
│   ├── proses_login.php
│   ├── proses_register.php
│   └── register.php
├── buku/
│   ├── list.php
│   ├── tambah.php
│   ├── proses_tambah.php
│   ├── edit.php
│   ├── proses_edit.php
│   └── hapus.php
├── docs/
│   └── wireframe.md
├── dokumentasi/
│   └── README.md
├── includes/
│   ├── auth.php
│   ├── footer.php
│   ├── header.php
│   └── koneksi.php
└── sql/
    ├── 01_buku_anggota.sql
    └── 02_user.sql
```

---

## ⚙️ Cara Menjalankan Project

### 1. Persiapan Database

Pastikan database `simpus_db` sudah tersedia dan PostgreSQL sedang berjalan.

Kemudian jalankan file:

```text
sql/02_user.sql
```

untuk membuat tabel pengguna yang digunakan dalam sistem autentikasi.

### 2. Jalankan Server PHP

Buka terminal pada folder `jobsheet10`, kemudian jalankan:

```bash
php -S localhost:8000
```

Akses aplikasi melalui browser:

```text
http://localhost:8000
```

---


