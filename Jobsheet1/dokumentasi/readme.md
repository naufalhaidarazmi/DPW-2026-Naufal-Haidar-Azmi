# 📄 Jobsheet 1 — HTML5 Semantic Skeleton

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
Jobsheet1/
├── anggota/
│   ├── list.html
│   └── tambah.html
├── buku/
│   ├── list.html
│   └── tambah.html
├── dokumentasi/
│   └── readme.md
└── index.html
```

### Penjelasan Struktur

| File/Folder           | Fungsi                                                 |
| :-------------------- | :----------------------------------------------------- |
| `index.html`          | Halaman utama atau beranda                             |
| `buku/`               | Menyimpan halaman yang berhubungan dengan data buku    |
| `buku/list.html`      | Halaman daftar buku                                    |
| `buku/tambah.html`    | Halaman form tambah buku                               |
| `anggota/`            | Menyimpan halaman yang berhubungan dengan data anggota |
| `anggota/list.html`   | Halaman daftar anggota                                 |
| `anggota/tambah.html` | Halaman form tambah anggota                            |

---

# 🗺️ Struktur Navigasi Website

Navigasi website terdiri dari beberapa halaman:

```text
                    ┌──────────────┐
                    │    Beranda   │
                    │ index.html   │
                    └──────┬───────┘
                           │
             ┌─────────────┴─────────────┐
             │                           │
             ▼                           ▼
      ┌─────────────┐             ┌───────────────┐
      │ Daftar Buku │             │ Daftar Anggota │
      │  list.html  │             │   list.html   │
      └──────┬──────┘             └──────┬────────┘
             │                           │
             ▼                           ▼
      ┌─────────────┐             ┌───────────────┐
      │ Tambah Buku │             │Tambah Anggota │
      │ tambah.html │             │  tambah.html  │
      └─────────────┘             └───────────────┘
```

---

# 📑 Halaman & Fitur

| Halaman               | File                  | Fungsi                                             |
| :-------------------- | :-------------------- | :------------------------------------------------- |
| 🏠 **Beranda**        | `index.html`          | Menampilkan halaman utama dan ringkasan statistik. |
| 📚 **Daftar Buku**    | `buku/list.html`      | Menampilkan 5 data buku dalam tabel.               |
| ➕ **Tambah Buku**     | `buku/tambah.html`    | Formulir untuk menambahkan data buku.              |
| 👥 **Daftar Anggota** | `anggota/list.html`   | Menampilkan 2 data anggota dalam tabel.            |
| ➕ **Tambah Anggota**  | `anggota/tambah.html` | Formulir pendaftaran anggota baru.                 |

---

# 💡 Konsep yang Dipelajari

## 1. Struktur Dasar HTML5

Setiap halaman menggunakan struktur dasar:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Judul Halaman</title>
</head>
<body>

</body>
</html>
```

`<!DOCTYPE html>` digunakan untuk mendeklarasikan HTML5, sedangkan `lang="id"` menunjukkan bahwa halaman menggunakan Bahasa Indonesia.

---

## 2. Semantic HTML

Project menggunakan elemen semantik seperti:

```html
<header>
<nav>
<main>
<section>
<article>
<footer>
```

Penggunaan elemen tersebut membuat struktur halaman lebih terorganisir dan mudah dipahami.

---

## 3. Relative Path

Navigasi antarhalaman menggunakan **relative path**.

### Dari root ke subfolder

```html
<a href="buku/list.html">Daftar Buku</a>
```

### Dari satu subfolder ke subfolder lain

```html
<a href="../anggota/list.html">Daftar Anggota</a>
```

`../` berarti naik satu tingkat folder.

### Untuk file yang berada dalam folder yang sama

```html
<a href="tambah.html">Tambah Buku</a>
```

---

## 4. Tabel

Data buku dan anggota ditampilkan menggunakan:

```html
<table>
<thead>
<tbody>
<tr>
<th>
<td>
```

Tabel digunakan untuk menyusun data berdasarkan baris dan kolom.

---

## 5. Form

Halaman tambah buku dan anggota menggunakan:

```html
<form>
<label>
<input>
<select>
<option>
<button>
```

Validasi bawaan HTML juga digunakan, seperti:

```text
required
min
max
```

Contoh:

```html
<input 
    type="number"
    min="1900"
    max="2026"
    required
>
```

---

## 6. `id` dan `name`

`id` digunakan sebagai identitas elemen pada dokumen HTML, sedangkan `name` digunakan sebagai nama/kunci data ketika form dikirim.

Contoh:

```html
<input
    type="text"
    id="nama_anggota"
    name="nama_anggota"
>
```
