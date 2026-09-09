
---

## 👤 Identitas Mahasiswa

| Keterangan | Detail             |
| :--------- | :----------------- |
| **Nama**   | Naufal Haidar Azmi |
| **Kelas**  | 2F/TI              |
| **Absen**  | 24                 |
| **NIM**    | 254107020163       |

---

## 📁 Struktur Direktori

Struktur direktori proyek pada Jobsheet 3 disusun untuk memisahkan halaman berdasarkan fungsinya serta mempermudah pengelolaan file HTML dan CSS.

```text
jobsheet3/
│
├── anggota/
│   ├── list.html
│   └── tambah.html
│
├── assets/
│   └── css/
│       └── style.css
│
├── buku/
│   ├── list.html
│   └── tambah.html
│
├── dokumentasi/
│   └── README.md
│
└── index.html
```

---

## 📑 Ringkasan Perubahan pada File HTML

Beberapa perubahan dilakukan pada file HTML untuk meningkatkan kemampuan website dalam menyesuaikan tampilan pada perangkat dengan ukuran layar yang berbeda.

### 1. 📱 Penambahan Tag `<meta name="viewport">`

Tag berikut ditambahkan ke dalam bagian `<head>` pada seluruh file HTML:

```html
<meta name="viewport" content="width=device-width, initial-scale=1">
```

Tag tersebut digunakan agar browser pada perangkat mobile menyesuaikan **lebar viewport dengan lebar layar perangkat sebenarnya**. Dengan demikian, website tidak lagi menggunakan tampilan yang terlalu lebar atau melakukan zoom-out secara otomatis.

---

### 2. ☰ Penambahan Elemen Menu Hamburger

Untuk membuat navigasi yang lebih sesuai pada perangkat mobile, ditambahkan elemen checkbox dan label di dalam `<header>`:

```html
<input type="checkbox" id="nav-toggle" class="nav-toggle">
<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
```

HTML entity **`&#9776;`** digunakan untuk menampilkan ikon menu hamburger **☰**.

Checkbox digunakan untuk menyimpan status menu, sedangkan `<label>` berfungsi sebagai tombol yang dapat diklik oleh pengguna untuk membuka atau menutup navigasi pada layar mobile.

---

### 3. 📊 Penambahan Wadah Tabel Responsif

Tabel pada halaman:

* `buku/list.html`
* `anggota/list.html`

dibungkus menggunakan elemen `<div>` dengan class **`.table-responsive`**.

Contohnya:

```html
<div class="table-responsive">
    <table>
        ...
    </table>
</div>
```

Pembungkus ini digunakan untuk menangani tabel yang memiliki lebar lebih besar daripada layar perangkat, sehingga tabel tetap dapat ditampilkan tanpa merusak tata letak halaman.

---

# 💡 Poin-Poin Konsep Penting

## 1. 🖥️ Strategi Desktop-First & Aturan Penulisan

Proyek ini menerapkan pendekatan **Desktop-First**, yaitu tampilan dasar website terlebih dahulu dirancang untuk layar berukuran lebar.

Setelah itu, penyesuaian tampilan untuk perangkat yang lebih kecil dilakukan menggunakan **`@media` query**:

```css
@media (max-width: 768px) {
    /* Penyesuaian untuk tablet */
}

@media (max-width: 480px) {
    /* Penyesuaian untuk mobile */
}
```

Blok `@media` diletakkan pada bagian **paling bawah** file `style.css`. Hal ini bertujuan agar aturan CSS di dalam media query dapat menimpa aturan sebelumnya ketika kondisi breakpoint terpenuhi sesuai dengan prinsip **cascading order** pada CSS.

---

## 2. ☰ Checkbox Hack — Menu Hamburger Tanpa JavaScript

Menu hamburger pada proyek ini dibuat tanpa menggunakan JavaScript. Teknik yang digunakan adalah **Checkbox Hack**, yaitu memanfaatkan elemen checkbox sebagai penyimpan status menu.

### 🔒 Status Tersembunyi

Checkbox asli disembunyikan menggunakan:

```css
.nav-toggle {
    display: none;
}
```

Meskipun tidak terlihat, checkbox tetap digunakan untuk menyimpan kondisi menu:

* **Tidak dicentang** → menu tertutup
* **Dicentang** → menu terbuka

### 🔘 Pengganti Tombol

Elemen `<label>` digunakan sebagai tombol interaktif pada perangkat mobile:

```css
.nav-toggle-label {
    display: block;
    cursor: pointer;
}
```

Ketika label diklik, checkbox yang terhubung dengannya akan berubah status.

### 🔗 General Sibling Combinator (`~`)

CSS menggunakan **General Sibling Combinator (`~`)** untuk menampilkan navigasi ketika checkbox dalam kondisi dicentang:

```css
.nav-toggle:checked ~ nav {
    display: block;
}
```

Selector tersebut akan memilih elemen saudara `<nav>` yang berada setelah checkbox. Ketika checkbox memiliki status `:checked`, elemen `<nav>` akan ditampilkan kembali.

### 📐 Penyesuaian Arah Menu

Pada layar mobile, menu navigasi diubah menjadi susunan vertikal menggunakan:

```css
flex-direction: column;
gap: 0.75rem;
```

Dengan demikian, setiap tautan navigasi akan tersusun dari atas ke bawah dengan jarak yang sesuai.

---

## 3. 📊 Scroll Tabel Horizontal — `.table-responsive`

Untuk mengatasi tabel yang memiliki ukuran lebih lebar daripada layar perangkat, digunakan properti:

```css
.table-responsive {
    overflow-x: auto;
}
```

Properti **`overflow-x: auto`** memungkinkan pengguna melakukan scroll secara horizontal apabila tabel melebihi lebar kontainer.

Dengan pendekatan ini, tabel tetap mempertahankan lebar aslinya sehingga:

* kolom tidak terpotong,
* isi tabel tidak saling berhimpitan,
* dan tata letak halaman tetap terjaga.

Scrollbar horizontal akan muncul secara otomatis ketika lebar tabel melebihi lebar kontainer.

---

## 4. 📐 Breakpoint dan Penataan Ulang Tata Letak

Breakpoint digunakan untuk menyesuaikan tampilan website berdasarkan ukuran layar perangkat.

### 📱 Breakpoint Tablet — `max-width: 768px`

Pada ukuran layar hingga **768px**, grid kartu statistik diubah dari tiga kolom menjadi dua kolom:

```css
grid-template-columns: repeat(2, 1fr);
```

Dengan pengaturan tersebut, kartu statistik akan tersusun menjadi dua kolom. Kartu ke-3 secara otomatis berpindah ke baris berikutnya.

---

### 📱 Breakpoint Mobile — `max-width: 480px`

Pada ukuran layar hingga **480px**, beberapa penyesuaian tambahan dilakukan agar website lebih nyaman digunakan pada perangkat mobile.

#### 🗂️ Kartu Statistik

Kartu statistik diubah menjadi satu kolom penuh:

```css
grid-template-columns: 1fr;
```

Dengan demikian, seluruh kartu akan tersusun secara vertikal dari atas ke bawah.

#### 📝 Input & Select Form

Nilai `max-width` pada field input dan select dilonggarkan menjadi:

```css
max-width: 100%;
```

Hal ini memungkinkan field untuk menggunakan lebar layar perangkat secara lebih proporsional.

#### ☰ Navigasi Header

Pada tampilan mobile, menu utama disembunyikan secara default:

```css
display: none;
```

Menu kemudian dapat ditampilkan menggunakan sistem **toggle dropdown** melalui checkbox hack yang telah dijelaskan sebelumnya.



<div align="center">

### 📱 Jobsheet 3 — Responsive Web Design

**Desain Pemrograman Web (DPW)**

</div>
