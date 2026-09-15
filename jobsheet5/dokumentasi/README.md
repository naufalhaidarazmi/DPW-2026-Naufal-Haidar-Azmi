# ⚡ Jobsheet 5 — JavaScript Fundamentals, DOM Manipulation & Client-Side Events

Dokumentasi ini berisi hasil praktikum **Desain Pemrograman Web (DPW)** pada **Jobsheet 5** yang membahas dasar-dasar **JavaScript**, manipulasi **DOM (Document Object Model)**, *event handling*, interaktivitas halaman web, serta **validasi form pada sisi client**.

Pada Jobsheet 5, halaman web yang sebelumnya bersifat statis mulai dikembangkan agar dapat memberikan respons terhadap interaksi pengguna secara langsung menggunakan JavaScript.

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

Struktur direktori Jobsheet 5 terdiri dari halaman HTML, stylesheet CSS, file JavaScript, dokumentasi, serta file pendukung lainnya.

```text
jobsheet5/
│
├── anggota/
│   ├── list.html
│   └── tambah.html
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   └── js/
│       └── app.js
│
├── buku/
│   ├── list.html
│   └── tambah.html
│
├── docs/
│   └── wireframe.md
│
├── dokumentasi/
│   └── README.md
│
└── index.html
```

---

# 💡 Konsep Dasar JavaScript & DOM

## 1. 🧩 Prinsip Tiga Lapisan Web (*Separation of Concerns*)

Dalam pengembangan web, HTML, CSS, dan JavaScript memiliki fungsi yang berbeda. Pemisahan tanggung jawab ini dikenal sebagai **Separation of Concerns**.

| Teknologi           | Fungsi                                                                                          |
| :------------------ | :---------------------------------------------------------------------------------------------- |
| **HTML**            | Menyediakan kerangka dan struktur konten semantik halaman.                                      |
| **CSS**             | Mengatur tata letak, warna, dan gaya visual halaman.                                            |
| **JavaScript (JS)** | Menambahkan perilaku interaktif dan dinamis ketika pengguna berinteraksi dengan elemen halaman. |

Dengan pembagian tersebut, setiap teknologi dapat menjalankan tugasnya masing-masing tanpa mencampurkan struktur, tampilan, dan logika interaksi dalam satu bagian.

---

## 2. 📜 Penempatan Tag `<script>`

File JavaScript eksternal dipanggil menggunakan tag:

```html
<script src="assets/js/app.js"></script>
```

Tag tersebut diletakkan di **bagian paling akhir sebelum tag penutup `</body>`**.

Penempatan ini bertujuan untuk memastikan elemen-elemen HTML telah selesai dimuat atau diproses (*parsed*) menjadi **DOM** sebelum kode JavaScript dijalankan.

Dengan demikian, elemen yang akan dimanipulasi oleh JavaScript dapat ditemukan dengan benar dan tidak menghasilkan nilai `null`.

---

## 3. 🛡️ Penyusunan Kode & Keamanan (*Architecture & Guard Clauses*)

File `app.js` digunakan pada beberapa halaman yang memiliki komponen berbeda. Oleh karena itu, diperlukan mekanisme untuk memastikan fungsi JavaScript hanya dijalankan ketika elemen yang dibutuhkan memang tersedia.

### ⏳ `DOMContentLoaded`

Inisialisasi utama JavaScript dibungkus menggunakan event **`DOMContentLoaded`**.

Event ini memastikan fungsi JavaScript dijalankan setelah struktur dokumen HTML selesai dimuat dan siap untuk dimanipulasi.

### 🛡️ Guard Clause

Digunakan pengecekan seperti:

```javascript
if (!elemen) return;
```

Teknik ini disebut **Guard Clause** dan digunakan untuk mencegah *runtime error* ketika file `app.js` dimuat pada halaman yang tidak memiliki komponen tertentu.

Contohnya, halaman beranda mungkin tidak memiliki tabel atau form sehingga fungsi yang membutuhkan elemen tersebut tidak perlu dijalankan.

---

# 🔄 Pembaruan pada File HTML & CSS Pendukung

Selain menambahkan JavaScript, beberapa perubahan juga dilakukan pada file HTML dan CSS untuk mendukung fitur interaktif yang dibuat.

## 1. ☰ Transisi Hamburger Menu

Trik **checkbox hack** yang digunakan pada Jobsheet sebelumnya digantikan dengan tombol HTML asli:

```html
<button
    type="button"
    id="nav-toggle-btn"
    class="nav-toggle-label"
    aria-label="Menu">
    &#9776;
</button>
```

Penggunaan tombol asli membuat kontrol menu lebih sesuai dengan fungsi interaktifnya.

CSS kemudian disederhanakan dengan menggunakan selector:

```css
header nav.nav-open {
    display: block;
}
```

Class `nav-open` akan ditambahkan atau dihapus oleh JavaScript ketika tombol hamburger diklik.

---

## 2. 🔍 Kotak Pencarian Real-Time — `.search-box`

Ditambahkan input teks dengan class **`.search-box`** di atas tabel.

Input tersebut digunakan untuk menangkap kata kunci yang dimasukkan pengguna dan kemudian digunakan untuk melakukan penyaringan data tabel secara real-time.

Contoh penggunaannya:

```text
[ 🔍 Cari data... ]
```

Ketika pengguna mengetikkan kata kunci, data tabel akan langsung disaring berdasarkan teks yang sesuai.

---

## 3. 🗑️ Penanda Tombol Aksi Hapus — `.btn-hapus`

Tombol **Hapus** pada tabel diberikan class:

```html
class="btn-hapus"
```

Class tersebut digunakan agar seluruh tombol hapus dapat ditemukan dan diproses secara kolektif oleh JavaScript.

Dengan demikian, event listener dapat dipasang pada seluruh tombol hapus tanpa harus menuliskan kode secara terpisah untuk setiap tombol.

---

## 4. ⚠️ Pesan Galat Form — `.error`

Ditambahkan class CSS **`.error`** untuk memberikan tampilan khusus pada pesan kesalahan validasi.

Elemen:

```html
<span class="error"></span>
```

akan dibuat dan disisipkan secara dinamis oleh JavaScript pada bagian bawah input yang mengalami kesalahan validasi.

Pesan error menggunakan warna merah **`#d9534f`** agar mudah dibedakan dari informasi form lainnya.

---

# 🛠️ Fitur Utama pada `assets/js/app.js`

File **`assets/js/app.js`** menjadi pusat pengelolaan interaksi dan logika JavaScript pada halaman website.

Beberapa fitur utama yang diterapkan adalah sebagai berikut.

---

## 1. ☰ Toggle Menu Hamburger — `initNavToggle`

Fungsi `initNavToggle` digunakan untuk mengatur buka-tutup menu navigasi pada perangkat dengan ukuran layar kecil.

Fungsi ini menggunakan event **`click`** dan:

```javascript
nav.classList.toggle("nav-open");
```

Method `classList.toggle()` digunakan untuk menambahkan class `nav-open` jika class tersebut belum ada dan menghapusnya jika sudah ada.

Dengan cara ini, status tampilan navbar dapat dibalik secara otomatis setiap kali tombol hamburger diklik.

---

## 2. 🗑️ Konfirmasi & Hapus Baris Tabel — `initHapusConfirm`

Fungsi `initHapusConfirm` digunakan untuk memberikan konfirmasi sebelum pengguna menghapus data pada tabel.

### 🔎 `querySelectorAll()` + `.forEach()`

Digunakan untuk memilih seluruh tombol dengan class `.btn-hapus`:

```javascript
querySelectorAll(".btn-hapus")
```

Kemudian `.forEach()` digunakan untuk memasang *event listener* pada setiap tombol.

### 📌 `.closest("tr")`

Method:

```javascript
closest("tr")
```

digunakan untuk mencari elemen baris tabel `<tr>` terdekat dari tombol yang diklik.

### 💬 `confirm()`

Method `confirm()` menampilkan dialog bawaan browser untuk meminta konfirmasi dari pengguna sebelum data dihapus.

### ❌ `row.remove()`

Jika pengguna mengonfirmasi penghapusan, method:

```javascript
row.remove();
```

digunakan untuk menghapus baris tersebut secara langsung dari DOM.

Penghapusan ini hanya terjadi pada tampilan **front-end** dan tidak memuat ulang halaman.

---

# 🔍 3. Filter Tabel Real-Time — `initTableFilter`

Fungsi `initTableFilter` digunakan untuk melakukan pencarian dan penyaringan data tabel secara langsung ketika pengguna mengetikkan kata kunci.

### ⌨️ Event `keyup`

Event **`keyup`** digunakan untuk mendeteksi setiap karakter yang selesai diketikkan oleh pengguna.

Dengan demikian, proses pencarian dapat dilakukan secara real-time tanpa harus menekan tombol pencarian.

### 🔡 Pencarian *Case-Insensitive*

Kata kunci dan isi baris diubah menjadi huruf kecil menggunakan:

```javascript
toLowerCase()
```

Hal ini membuat pencarian tidak membedakan huruf kapital dan huruf kecil.

Contohnya:

```text
"Buku"
"buku"
"BUKU"
```

akan dianggap sebagai kata yang sama dalam proses pencarian.

### 👁️ Menampilkan dan Menyembunyikan Baris

Penyaringan dilakukan menggunakan:

```javascript
row.style.display = teks.includes(keyword) ? "" : "none";
```

Jika teks pada baris mengandung kata kunci, baris akan ditampilkan. Jika tidak, baris tersebut akan disembunyikan dari tampilan.

---

# 📝 4. Validasi Form Client-Side — `initValidasiForm`

Fungsi `initValidasiForm` digunakan untuk melakukan validasi data sebelum form dikirim.

Validasi dilakukan pada sisi **client** menggunakan JavaScript sehingga pengguna dapat langsung mengetahui kesalahan input tanpa harus mengirim data terlebih dahulu.

---

## 🚫 Mencegah Submit Default

Ketika data tidak valid, digunakan:

```javascript
e.preventDefault();
```

Method tersebut digunakan untuk mencegah proses submit default sehingga halaman tidak melakukan reload ketika masih terdapat kesalahan pada data yang dimasukkan.

---

## 🧱 Manipulasi DOM Dinamis

JavaScript digunakan untuk membuat dan memasukkan pesan error langsung ke dalam halaman.

### Membuat Elemen Error

Digunakan:

```javascript
document.createElement("span");
```

untuk membuat elemen `<span>` baru yang akan digunakan sebagai tempat menampilkan pesan kesalahan.

### Menyisipkan Pesan Error

Elemen error kemudian ditempatkan setelah input menggunakan:

```javascript
input.insertAdjacentElement("afterend", span);
```

Dengan demikian, pesan error akan muncul tepat di bawah input yang mengalami kesalahan.

### Membersihkan Error Sebelumnya

Properti:

```javascript
input.nextElementSibling
```

digunakan untuk memeriksa elemen yang berada tepat setelah input.

Cara tersebut membantu proses pengecekan dan pembersihan pesan error sebelumnya melalui fungsi `hapusError()`.

---

# ✅ Aturan Pengecekan Validasi

Validasi form menggunakan beberapa aturan untuk memastikan data yang dimasukkan sesuai dengan ketentuan.

### 1. 🔤 Memeriksa Input Teks

Kekosongan input teks diperiksa menggunakan:

```javascript
.trim() === ""
```

Method `.trim()` digunakan untuk menghapus spasi kosong pada awal dan akhir teks sehingga input yang hanya berisi spasi dapat dianggap sebagai input kosong.

---

### 2. 📅 Validasi Tahun

Nilai tahun diperiksa menggunakan:

```javascript
parseInt()
```

dan:

```javascript
isNaN()
```

Rentang tahun yang diperbolehkan adalah:

```text
1900 – 2026
```

Dengan validasi tersebut, sistem dapat memastikan bahwa nilai tahun yang dimasukkan berupa angka dan berada dalam rentang yang telah ditentukan.

---

### 3. 📦 Validasi Stok

Jumlah stok juga divalidasi menggunakan `parseInt()` dan `isNaN()`.

Ketentuan stok yang digunakan adalah:

```text
Stok ≥ 0
```

Artinya, nilai stok tidak boleh bernilai negatif.


<div align="center">

### ⚡ Jobsheet 5 — JavaScript Fundamentals

**DOM Manipulation • Events • Form Validation**

**Desain Pemrograman Web (DPW)**

</div>
