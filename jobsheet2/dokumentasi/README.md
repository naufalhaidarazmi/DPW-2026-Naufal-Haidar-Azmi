# 🎨 Jobsheet 2 — CSS Fundamentals, Box Model & Modern Layouts

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
Jobsheet2/
├── anggota/
│   ├── list.html
│   └── tambah.html
├── assets/
│   └── css/
│       └── style.css
├── buku/
│   ├── list.html
│   └── tambah.html
├── dokumentasi/
│   └── README.md
└── index.html
```

---

# 💡 Konsep dan Pembahasan Materi

## 1. 🔄 Reset & Box-Sizing

### `box-sizing: border-box`

```css
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
```

* **Box-Sizing `border-box`**
  Mengunci ukuran total elemen. Nilai `padding` dan `border` dihitung ke dalam `width`/`height` yang ditentukan, sehingga mencegah kotak membengkak ke luar.

* **Margin & Padding Reset**
  Menghilangkan margin dan padding bawaan peramban agar tata letak konsisten di semua layar.

---

## 2. 📦 Memahami CSS Box Model

CSS Box Model terdiri dari beberapa bagian utama yang mengatur ukuran dan jarak suatu elemen.

### 🟦 Margin

**Margin** adalah ruang kosong transparan di **luar** garis tepi (*border*).

Berfungsi sebagai daya dorong untuk mengatur jarak antar elemen secara independen, misalnya mendorong kontainer ke bawah.

### 🟨 Border

**Border** adalah garis pembatas fisik di sekeliling elemen.

Sudut border dapat diperhalus menggunakan:

```css
border-radius
```

### 🟩 Padding

**Padding** adalah bantalan ruang kosong di **dalam** garis tepi (*border*), berada di antara border dan konten utama.

Berfungsi untuk:

* Memberikan ruang agar teks/isi tidak menempel pada pinggiran kotak.
* Membuat tampilan elemen menjadi lebih lega.
* Area padding ikut terwarnai oleh `background-color`.

### 📐 Aturan Shorthand

CSS menyediakan penulisan shorthand untuk mengatur keempat sisi sekaligus.

| Jumlah Nilai | Contoh               | Keterangan                                            |
| :----------: | :------------------- | :---------------------------------------------------- |
|  **1 nilai** | `10px`               | Berlaku untuk keempat sisi: atas, kanan, bawah, kiri. |
|  **2 nilai** | `10px 20px`          | Nilai 1 untuk atas-bawah, nilai 2 untuk kanan-kiri.   |
|  **4 nilai** | `10px 20px 15px 5px` | Berputar searah jarum jam: Top, Right, Bottom, Left.  |

### 🎯 `margin: 0 auto;`

```css
margin: 0 auto;
```

Membagi sisa ruang kanan-kiri secara seimbang untuk memposisikan kontainer tepat di tengah halaman.

---

## 3. 🧩 Layout Modern: Flexbox vs CSS Grid

CSS menyediakan dua metode utama untuk membuat layout modern, yaitu **Flexbox** dan **CSS Grid**.

### 🔹 Flexbox — `display: flex`

Flexbox diterapkan pada komponen **satu dimensi**, seperti navigasi `<header>` dan baris menu (`<nav> <ul>`).

Properti yang digunakan antara lain:

```css
display: flex;
justify-content: space-between;
gap: ...;
```

* `justify-content: space-between` digunakan untuk meratakan logo di kiri dan menu di kanan.
* `gap` digunakan untuk memberikan jarak antar tautan menu.

---

### 🔹 CSS Grid — `display: grid`

CSS Grid diterapkan pada komponen **dua dimensi**, seperti deretan kartu ringkasan.

```css
grid-template-columns: repeat(3, 1fr);
```

`grid-template-columns: repeat(3, 1fr)` mengunci area tata letak menjadi **3 kolom dengan lebar seimbang**.

Konten ke-4 dan seterusnya otomatis terdorong ke baris baru.

### 🎯 Solusi Penataan Heading

```css
grid-column: 1 / -1;
```

Properti `grid-column: 1 / -1` membentangkan elemen judul `<h2>` dari garis batas pertama (ujung kiri) hingga garis batas terakhir (ujung kanan).

Dengan demikian, `<h2>` memakan seluruh baris atas sendirian sehingga kartu-kartu statistik dapat berjajar rapi di baris bawahnya.

---

## 4. 📊 Styling Komponen Tabel Data

Tabel digunakan untuk menampilkan data agar lebih terstruktur dan mudah dibaca.

### `border-collapse: collapse`

```css
border-collapse: collapse;
```

Meleburkan garis pembatas ganda bawaan tabel menjadi satu garis tunggal yang rapat dan rapi.

### `width: 100%`

```css
width: 100%;
```

Membuat tabel membentang penuh mengikuti wadah kontainernya.

### 🦓 Zebra Striping

```css
tbody tr:nth-child(even)
```

Memberi warna alternatif pada baris genap untuk meningkatkan kenyamanan visual saat membaca data.

### 🖱️ Efek Interaktif

```css
tbody tr:hover
```

Mengubah warna baris data ketika kursor diarahkan ke atasnya.

### 🎯 Penargetan Tombol Aksi

Penargetan tombol aksi menggunakan pseudo-class CSS.

| Selektor          | Fungsi                                                            |
| :---------------- | :---------------------------------------------------------------- |
| `:first-of-type`  | Memberi latar oranye pada tombol aksi pertama (**Edit**).         |
| `:last-of-type`   | Memberi latar merah pada tombol aksi terakhir (**Hapus**).        |
| `:nth-of-type(n)` | Dapat digunakan jika terdapat lebih dari dua variasi tombol aksi. |

---

# 📝 Kesimpulan

Pada **Jobsheet 2** dipelajari dasar-dasar CSS, mulai dari **reset styling**, **Box Model**, **Flexbox**, **CSS Grid**, hingga **styling tabel data**.

Materi tersebut digunakan untuk membuat tampilan halaman website menjadi lebih **terstruktur, rapi, dan mudah dibaca**.
