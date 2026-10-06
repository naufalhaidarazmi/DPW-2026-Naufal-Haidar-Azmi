# 🚀 Jobsheet 9 — Full CRUD, Pagination & Server-Side Search

Jobsheet 9 merupakan pengembangan lanjutan dari **SIMPUS-Mini** berbasis **PHP dan PostgreSQL**. Jika pada Jobsheet 8 aplikasi telah menerapkan operasi **Create** dan **Read**, pada Jobsheet 9 siklus **Full CRUD** dilengkapi dengan fitur **Update** dan **Delete**.

Selain itu, aplikasi dikembangkan dengan **Pagination** dan **Pencarian Sisi Server** agar pengelolaan data dalam jumlah lebih banyak menjadi lebih efisien.

---

## 🛠️ Fitur Utama

### 🔄 1. Update Data

Fitur perubahan data menggunakan `edit.php` dan `proses_edit.php`.

* ID data diambil melalui parameter URL, seperti `edit.php?id=3`.
* Data lama diambil menggunakan `SELECT ... WHERE id = :id`.
* Form secara otomatis menampilkan data yang sebelumnya tersimpan.
* ID disimpan menggunakan `<input type="hidden">`.
* Perubahan data dilakukan dengan query `UPDATE ... WHERE id = :id`.

Penggunaan `WHERE id = :id` penting agar hanya data yang dipilih yang diperbarui.

### 🗑️ 2. Delete Data

Penghapusan data dilakukan melalui `hapus.php` dengan beberapa pengamanan:

* Proses penghapusan hanya menerima metode **POST**.
* ID data dikirim melalui form menggunakan input `hidden`.
* Query menggunakan **prepared statement**.
* Tombol hapus dilengkapi konfirmasi menggunakan JavaScript.

### ⚠️ 3. Konfirmasi Penghapusan

Konfirmasi hapus diterapkan menggunakan **Event Delegation pada event `submit`**.

```javascript
document.addEventListener("submit", function (e) {
    const form = e.target.closest(".form-hapus");

    if (!form) return;

    const yakin = confirm("Yakin ingin menghapus data?");

    if (!yakin) {
        e.preventDefault();
    }
});
```

Jika pengguna memilih **Cancel**, pengiriman form dibatalkan. Jika memilih **OK**, form dilanjutkan ke `hapus.php`.

---

## 📄 Pagination

Pagination digunakan untuk membatasi jumlah data yang ditampilkan pada satu halaman.

* Maksimal **5 data per halaman**.
* Menggunakan `LIMIT` dan `OFFSET` pada query PostgreSQL.
* Offset dihitung menggunakan:

```php
$offset = ($page - 1) * $perPage;
```

* Total halaman dihitung menggunakan `ceil()`.

Dengan pagination, data dalam jumlah besar tidak perlu ditampilkan sekaligus dalam satu halaman.

---

## 🔎 Pencarian Sisi Server

Pencarian dilakukan langsung pada database menggunakan operator PostgreSQL **`ILIKE`**.

```sql
WHERE judul ILIKE :keyword
```

Penggunaan pola `%keyword%` memungkinkan pencarian dilakukan pada bagian mana pun dari teks.

Form pencarian menggunakan metode **GET**, sehingga kata kunci dapat terlihat pada URL, contohnya:

```text
list.php?q=javascript
```

Pencarian kemudian diproses kembali oleh server sebelum data ditampilkan kepada pengguna.

---

## 📁 Struktur Direktori

```text
jobsheet9/
├── index.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── koneksi.php
├── buku/
│   ├── list.php
│   ├── tambah.php
│   ├── proses_tambah.php
│   ├── edit.php
│   ├── proses_edit.php
│   └── hapus.php
├── anggota/
│   ├── list.php
│   ├── tambah.php
│   ├── proses_tambah.php
│   ├── edit.php
│   ├── proses_edit.php
│   └── hapus.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── docs/
│   └── wireframe.md
└── sql/
    └── 01_buku_anggota.sql
```

---

## ⚙️ Cara Menjalankan Aplikasi

### 1. Persiapan Database

Pastikan **PostgreSQL** sudah aktif, kemudian buat database:

```text
simpus_db
```

Setelah itu, jalankan file:

```text
sql/01_buku_anggota.sql
```

untuk membuat tabel dan memasukkan data awal.

### 2. Konfigurasi Database

Buka:

```text
includes/koneksi.php
```

Kemudian sesuaikan konfigurasi `$user` dan `$password` dengan PostgreSQL yang digunakan.

### 3. Jalankan Server PHP

Buka terminal pada folder `jobsheet9`, lalu jalankan:

```bash
php -S localhost:8000
```

Kemudian akses aplikasi melalui:

```text
http://localhost:8000
```

---

