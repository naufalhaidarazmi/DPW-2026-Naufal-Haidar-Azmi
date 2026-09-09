# 📐 Jobsheet 4 — UI/UX Design: Wireframing, User Flow & Otorisasi

Dokumentasi ini berisi hasil praktikum **Desain Pemrograman Web (DPW)** pada **Jobsheet 4** yang membahas perancangan **UI/UX**, meliputi **Wireframing**, **User Flow**, pemetaan aktor, serta konsep **otorisasi** dalam sebuah sistem informasi.

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

Struktur direktori pada Jobsheet 4 digunakan untuk mengorganisir halaman HTML, stylesheet, dokumentasi wireframe, serta berkas visual rancangan sistem.

```text id="x9b2jc"
jobsheet4/
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
├── docs/
│   └── wireframe.md
│
├── dokumentasi/
│   └── README.md
│
├── index.html
│
└── Infografis.png
```

---

## 📊 Infografis Rancangan Sistem

Berkas visual **`Infografis.png`** digunakan untuk menampilkan bagan ringkas mengenai **alur transaksi** dan **wireframe sistem**.

Infografis tersebut membantu memberikan gambaran visual mengenai rancangan sistem sebelum proses implementasi dan pengodean dilakukan.

---

# 💡 Poin-Poin Konsep UI/UX Design

## 1. 🎨 Perbedaan Mendasar UI vs UX

Dalam proses perancangan sebuah sistem, **User Interface (UI)** dan **User Experience (UX)** memiliki fokus yang berbeda, tetapi saling berkaitan.

### 🖌️ User Interface (UI)

**User Interface (UI)** berfokus pada aspek visual dan estetika dari sebuah antarmuka, seperti:

* Tata letak (*layout*)
* Tipografi
* Palet warna
* Elemen form
* Tampilan komponen antarmuka

Pada proyek ini, aspek visual tersebut telah diatur melalui file:

```text
assets/css/style.css
```

### 🧭 User Experience (UX)

**User Experience (UX)** berfokus pada kemudahan, efisiensi alur logika, serta kenyamanan pengguna ketika menggunakan sistem untuk mencapai tujuannya.

Contohnya adalah kemudahan petugas dalam:

* Mencari buku
* Memilih anggota
* Mencatat transaksi peminjaman
* Memproses pengembalian buku

Dengan demikian, UI lebih menitikberatkan pada **bagaimana tampilan sistem**, sedangkan UX lebih berfokus pada **bagaimana pengguna berinteraksi dan merasakan pengalaman saat menggunakan sistem**.

---

## 2. 🧠 Pentingnya Tahap Perancangan Sebelum Pengodean

Tahap perancangan dilakukan sebelum proses pengodean agar struktur dan aturan sistem dapat dipikirkan dengan lebih matang.

Beberapa manfaat dari tahap perancangan antara lain:

### 📋 Memetakan Aturan Bisnis

Aturan bisnis (*business rules*) dapat ditentukan terlebih dahulu sebelum kode ditulis.

Contohnya:

> Validasi stok buku harus **> 0** agar peminjaman tidak menyebabkan inkonsistensi data.

### 💰 Mengurangi Biaya Perbaikan

Tahap perancangan dapat menekan **cost of change**, karena perubahan pada dokumen rancangan jauh lebih cepat dilakukan dibandingkan merombak struktur kode yang sudah terbangun.

### 🏗️ Berfokus pada Arsitektur Alur

Pada Jobsheet 4, fokus utama berada pada **perancangan arsitektur alur** tanpa menambahkan implementasi kode baru (*zero-code additions*).

Dengan demikian, struktur dan logika sistem dapat dirancang terlebih dahulu sebelum masuk ke tahap pemrograman.

---

# 🛠️ Dua Instrumen Utama Perancangan

## 1. 🖼️ Wireframe

**Wireframe** merupakan sketsa tata letak kasar dengan format **low-fidelity** yang digunakan untuk memvisualisasikan posisi komponen pada suatu halaman.

Pada Jobsheet 4, wireframe dibuat menggunakan format **ASCII art** sehingga fokus utama berada pada:

* Struktur halaman
* Penempatan komponen
* Susunan informasi
* Hubungan antarbagian halaman

Wireframe tidak berfokus pada detail warna maupun grafis sehingga proses perancangan dapat dilakukan dengan lebih cepat.

---

## 2. 🔄 User Flow

**User Flow** merupakan diagram yang menggambarkan urutan interaksi pengguna secara langkah demi langkah dari satu layar ke layar lainnya.

User Flow digunakan untuk memvalidasi apakah alur tugas pengguna sudah berjalan dengan jelas, mulai dari proses awal hingga tujuan akhir.

---

# 👥 Pemetaan Aktor & Konsep Otorisasi

Sistem memiliki dua jenis aktor utama dengan hak akses yang berbeda.

## 👤 1. Tamu (*Guest*)

| Aspek           | Keterangan                                                                 |
| :-------------- | :------------------------------------------------------------------------- |
| **Hak Akses**   | Publik / *Read-Only*                                                       |
| **Autentikasi** | Tidak diperlukan                                                           |
| **Cakupan**     | Membuka Beranda (`index.html`) dan melihat katalog buku (`buku/list.html`) |

Tamu hanya dapat mengakses informasi yang bersifat publik dan tidak memiliki akses untuk mengubah data sistem.

---

## 🧑‍💼 2. Petugas (*Staff*)

| Aspek           | Keterangan                                                     |
| :-------------- | :------------------------------------------------------------- |
| **Hak Akses**   | Privat / *Full-Access*                                         |
| **Autentikasi** | Memerlukan *login*                                             |
| **Cakupan**     | Mengelola CRUD data buku dan anggota serta menangani transaksi |

Petugas memiliki akses untuk melakukan operasi **CRUD** terhadap data buku dan anggota, serta menangani modul transaksi peminjaman dan pengembalian.

---

## 🔐 3. Konsep Otorisasi

**Otorisasi** menjadi dasar dalam menentukan halaman dan fitur apa saja yang dapat diakses oleh setiap aktor.

Pada rancangan ini, konsep otorisasi digunakan untuk menyaring akses terhadap halaman administratif.

Implementasi keamanan tersebut akan dikembangkan lebih lanjut pada **Jobsheet 5 dan seterusnya**, yang mulai menggunakan **JavaScript dan modul backend**.

---

# 🔄 Rangkuman Alur Bisnis Transaksi

## 📚 Peminjaman Buku

Alur proses peminjaman buku dirancang sebagai berikut:

```text id="k6w7t2"
[Petugas Login]
       ↓
[Dashboard]
       ↓
[Aksi Cepat: Peminjaman Baru]
       ↓
[Pilih Anggota]
       ↓
[Pilih Buku (Stok > 0)]
       ↓
[Simpan]
       ↓
[Sistem Eksekusi Stok -1]
       ↓
[Kembali ke Dashboard]
```

Pada proses tersebut, sistem memastikan bahwa buku yang dipilih memiliki **stok lebih dari 0** sebelum transaksi dapat disimpan.

Setelah peminjaman berhasil, stok buku akan dikurangi sebanyak **1**.

---

## 📕 Pengembalian Buku

Alur proses pengembalian buku dirancang sebagai berikut:

```text id="2v4c6w"
[Dashboard]
       ↓
[Menu Pengembalian]
       ↓
[Cari Transaksi Aktif]
       ↓
[Verifikasi Status / Denda]
       ↓
[Tandai Selesai]
       ↓
[Sistem Eksekusi Stok +1]
       ↓
[Kembali ke Dashboard]
```

Pada proses pengembalian, sistem melakukan pencarian terhadap transaksi yang masih aktif, kemudian melakukan verifikasi status dan denda sebelum transaksi ditandai selesai.

Setelah buku berhasil dikembalikan, stok buku akan bertambah sebanyak **1**.

---

# 🔗 Keterhubungan dengan Kode yang Sudah Ada

Perancangan pada Jobsheet 4 tetap mempertimbangkan struktur dan komponen yang telah dibuat pada Jobsheet sebelumnya.

## 🎨 Penggunaan Ulang Desain (*Reusable CSS*)

Wireframe halaman baru dirancang agar tetap selaras dengan pola komponen yang telah digunakan pada **Jobsheet 2–3**.

Beberapa komponen yang digunakan kembali meliputi:

* Variabel warna `#1d5b8a`
* Kartu putih bersekat
* Styling form
* Tabel dengan `.table-responsive`

Penggunaan ulang komponen tersebut membantu menjaga konsistensi tampilan antarhalaman.


<div align="center">

### 📐 Jobsheet 4 — UI/UX Design

**Wireframing • User Flow • Otorisasi**

**Desain Pemrograman Web (DPW)**

</div>
