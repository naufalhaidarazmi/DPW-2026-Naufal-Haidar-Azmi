# 🌐 Jobsheet 6 — Asynchronous JavaScript: AJAX, Fetch API, JSON & Event Delegation



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

```text
jobsheet6/
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
│       ├── anggota.js
│       ├── app.js
│       └── buku.js
│
├── buku/
│   ├── list.html
│   └── tambah.html
│
├── data/
│   ├── anggota.json
│   └── buku.json
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

# 💡 Konsep Dasar Komunikasi Asinkron

## 1. 🔄 AJAX & Perubahan Paradigma

**AJAX (Asynchronous JavaScript and XML)** memungkinkan halaman web mengambil dan memperbarui data di latar belakang tanpa melakukan *reload* seluruh halaman.

Pada Jobsheet 6, data yang sebelumnya ditulis secara statis pada HTML dihapus. Elemen `<tbody>` kemudian diisi secara dinamis oleh JavaScript melalui proses **client-side rendering**.

---

## 2. 📦 Format Data JSON

**JSON (JavaScript Object Notation)** merupakan format pertukaran data berbasis teks yang digunakan untuk menyimpan dan mengirimkan data.

Data pada proyek menggunakan struktur **Array of Objects**:

```json
[
    {
        "nama": "Contoh Data",
        "tahun": 2024
    }
]
```

Setiap objek memiliki pasangan **key-value**. Penamaan `key` menggunakan tanda kutip dua (`"..."`) dan dibuat konsisten dengan atribut `name` pada elemen form.

---

## 3. ⏳ Promise & `async/await`

Method `fetch()` menghasilkan sebuah **Promise**, yaitu objek yang merepresentasikan hasil dari proses yang belum selesai.

Untuk menangani Promise digunakan pola modern:

```javascript
async function ambilData() {
    const res = await fetch("data/buku.json");
}
```

`await` digunakan di dalam `async function` untuk menunggu penyelesaian Promise tanpa membekukan antarmuka browser.

---

## 4. ⚠️ Penanganan Error dengan `try/catch/finally`

Proses pengambilan data menggunakan tiga bagian utama:

| Bagian        | Fungsi                                                                           |
| :------------ | :------------------------------------------------------------------------------- |
| **`try`**     | Menjalankan proses request yang berpotensi mengalami kegagalan.                  |
| **`catch`**   | Menangkap error jaringan atau status HTTP yang tidak valid.                      |
| **`finally`** | Selalu dijalankan setelah proses selesai untuk menyembunyikan indikator loading. |

Jika terjadi error, pesan yang sesuai akan ditampilkan pada tabel menggunakan `colspan="5"`.

---

# 🔄 Pembaruan pada Berkas Proyek

### 🧹 Pembersihan Data Statis

Data *hardcoded* pada HTML dihapus dan digantikan dengan data dari:

* `data/buku.json` → **10 data buku**
* `data/anggota.json` → **4 data anggota**

### ⏳ Indikator Loading

Ditambahkan elemen:

```html
<p id="loading-indicator" style="display:none;">
    Memuat data...
</p>
```

Indikator ditampilkan sebelum proses request dan disembunyikan kembali setelah proses selesai pada bagian `finally`.

### 🧩 Modularisasi JavaScript

Logika JavaScript dipisahkan berdasarkan fungsinya:

| File             | Fungsi                                                                                     |
| :--------------- | :----------------------------------------------------------------------------------------- |
| **`app.js`**     | Logika global seperti navigasi hamburger, filter tabel, dan Event Delegation tombol hapus. |
| **`buku.js`**    | Memuat dan menampilkan data buku.                                                          |
| **`anggota.js`** | Memuat dan menampilkan data anggota.                                                       |

---

# 🛠️ Fitur Utama JavaScript

## 1. 📚 Pengambilan & Render Data

Fungsi:

* `muatDaftarBuku`
* `muatDaftarAnggota`

digunakan untuk mengambil data JSON dan menampilkannya ke dalam tabel.

Alur prosesnya:

```text
Fetch JSON
    ↓
Validasi res.ok
    ↓
Parsing dengan res.json()
    ↓
Loop menggunakan forEach()
    ↓
Membuat elemen <tr>
    ↓
Mengisi data dengan innerHTML
    ↓
appendChild() ke <tbody>
```

Selain itu, digunakan simulasi latensi:

```javascript
await new Promise((resolve) => setTimeout(resolve, 600));
```

untuk memberikan waktu agar indikator loading dapat terlihat.

---

## 2. 🖱️ Event Delegation

Pada Jobsheet 5, tombol hapus ditemukan menggunakan `querySelectorAll()`. Namun pada Jobsheet 6, tombol hapus dibuat **secara dinamis setelah proses `fetch()`** sehingga pendekatan tersebut tidak dapat digunakan secara langsung saat halaman pertama kali dimuat.

Solusinya adalah menggunakan **Event Delegation**:

```javascript
document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-hapus");

    if (!btn) return;

    // Konfirmasi dan hapus baris
});
```

Teknik ini memanfaatkan **event bubbling**, yaitu event dari elemen akan diteruskan ke elemen induknya hingga `document`.

Dengan cara tersebut, tombol `.btn-hapus` yang dibuat setelah proses `fetch()` tetap dapat ditangani oleh JavaScript.

---

# ⚠️ CORS & Menjalankan Server Lokal

Karena browser membatasi penggunaan `fetch()` terhadap file lokal dengan protokol **`file:///`**, proyek Jobsheet 6 harus dijalankan melalui **server HTTP lokal**.

### Opsi 1 — VS Code Live Server

Klik kanan `index.html`, kemudian pilih:

```text
Open with Live Server
```

### Opsi 2 — PHP CLI Server

Jalankan perintah berikut pada terminal di folder proyek:

```bash
php -S localhost:8000
```

Kemudian buka:

```text
http://localhost:8000/index.html
```

### Opsi 3 — Laragon / XAMPP

Tempatkan folder proyek pada **web root** server lokal, aktifkan Apache, kemudian akses proyek melalui browser.

---

# 🎯 Kesimpulan

Pada **Jobsheet 6**, website dikembangkan agar dapat mengambil data secara **asinkron** menggunakan **Fetch API dan JSON** tanpa melakukan *reload* seluruh halaman.

Konsep utama yang diterapkan meliputi:

* **AJAX & Fetch API**
* **JSON**
* **Promise & `async/await`**
* **`try/catch/finally`**
* **Client-Side Rendering**
* **Event Delegation**
* **Loading Indicator**
* **Modularisasi JavaScript**
* **Server HTTP Lokal & CORS**
---

<div align="center">

### 🌐 Jobsheet 6 — Asynchronous JavaScript

**AJAX • Fetch API • JSON • Event Delegation**

**Desain Pemrograman Web (DPW)**

</div>
