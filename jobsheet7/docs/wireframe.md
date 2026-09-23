1. User Flow: Navigasi Antar Halaman
Plaintext
+-----------------------+
               |   Pengguna Membuka    |
               |       Website         |
               +-----------+-----------+
                           |
                           v
               +-----------------------+
               |        Beranda        |
               |     (index.html)      |
               +-----------+-----------+
                           |
       +-------------------+-------------------+
       |                   |                   |
       v                   v                   v
+--------------+    +--------------+    +--------------+
| Daftar Buku  |    | Tambah Buku  |    |Daftar Anggota|
| (list.html)  |    |(tambah.html) |    | (list.html)  |
+--------------+    +--------------+    +--------------+

2. User Flow: Melihat Ringkasan Data (Beranda)
[Mulai]
   │
   ▼
[Buka index.html]
   │
   ▼
[Baca Pesan Sambutan]
   │
   ▼
[Lihat Kartu Statistik: Total Buku (12), Total Anggota (8), Sedang Dipinjam (3)]
   │
   ▼
[Pilih Menu di Header untuk Pindah Halaman]
   │
   ▼
[Selesai]

3. User Flow: Melihat & Mengelola Data Buku
[Mulai]
   │
   ▼
[Klik Menu "Daftar Buku"]
   │
   ▼
[Sistem Memuat Tabel Koleksi Buku]
   │
   ▼
[Pengguna Membaca Baris Data: Judul, Pengarang, Tahun, Stok]
   │
   ├──► [Klik Tombol "Edit"]  ──► (Rencana Fitur Edit / Belum Aktif)
   │
   └──► [Klik Tombol "Hapus"] ──► (Rencana Fitur Hapus / Belum Aktif)

4. User Flow: Menambahkan Buku Baru
[Mulai]
   │
   ▼
[Klik Menu "Tambah Buku"]
   │
   ▼
[Sistem Menampilkan Formulir Tambah Buku]
   │
   ▼
[Isi Field Form: Judul, Pengarang, Tahun, ISBN, Stok, Kategori]
   │
   ▼
[Klik Tombol "Simpan"]
   │
   ├──► [Jika Ada Field Required Kosong] ──► [Browser Tolak Submit & Tampilkan Peringatan]
   │                                                     │
   │                                                     └──► [Lengkapi Form]
   │
   └──► [Jika Validasi Berhasil] ──► [Form Terkirim / Reload Halaman] ──► [Selesai]

5. User Flow: Melihat Data Anggota
[Mulai]
   │
   ▼
[Klik Menu "Daftar Anggota"]
   │
   ▼
[Sistem Menampilkan Tabel Anggota: No. Anggota, Nama, Alamat, No. HP]
   │
   ▼
[Pengguna Melihat Data Anggota (A001, A002)]
   │
   ├──► [Klik Tombol "Edit"]  ──► (Rencana Fitur Edit / Belum Aktif)
   │
   └──► [Klik Tombol "Hapus"] ──► (Rencana Fitur Hapus / Belum Aktif)



1. Wireframe: Beranda (index.html)
+--------------------------------------------------------------------------------------------------+
| SIMPUS-Mini                                           Beranda  Daftar Buku  Tambah Buku  Anggota |
+--------------------------------------------------------------------------------------------------+
|                                                                                                  |
|   +------------------------------------------------------------------------------------------+   |
|   | Selamat Datang di Sistem Perpustakaan Mini                                               |   |
|   | Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.                   |   |
|   +------------------------------------------------------------------------------------------+   |
|                                                                                                  |
|   +------------------------------------------------------------------------------------------+   |
|   | Ringkasan                                                                                |   |
|   |                                                                                          |   |
|   |   +----------------------+    +----------------------+    +----------------------+       |   |
|   |   |      Total Buku      |    |    Total Anggota     |    |    Sedang Dipinjam   |       |   |
|   |   |          12          |    |          8           |    |          3           |       |   |
|   |   +----------------------+    +----------------------+    +----------------------+       |   |
|   +------------------------------------------------------------------------------------------+   |
|                                                                                                  |
|                                  © 2026 SIMPUS-Mini — Jobsheet 3                                 |
+--------------------------------------------------------------------------------------------------+


2. Wireframe: Daftar Buku (buku/list.html)
+--------------------------------------------------------------------------------------------------+
| SIMPUS-Mini                                           Beranda  Daftar Buku  Tambah Buku  Anggota |
+--------------------------------------------------------------------------------------------------+
|                                                                                                  |
|   +------------------------------------------------------------------------------------------+   |
|   | Daftar Buku                                                                              |   |
|   |                                                                                          |   |
|   |   +----------------------------------------------------------------------------------+   |   |
|   |   | Judul                | Pengarang             | Tahun | Stok | Aksi               |   |   |
|   |   |----------------------+-----------------------+-------+------+--------------------|   |   |
|   |   | Laskar Pelangi       | Andrea Hirata         | 2005  | 4    | [Edit]   [Hapus]   |   |   |
|   |   | Bumi Manusia         | Pramoedya Ananta Toer | 1980  | 2    | [Edit]   [Hapus]   |   |   |
|   |   | Negeri 5 Menara      | Ahmad Fuadi           | 2009  | 0    | [Edit]   [Hapus]   |   |   |
|   |   | Filosofi Teras       | Henry Manampiring     | 2018  | 5    | [Edit]   [Hapus]   |   |   |
|   |   | Ronggeng Dukuh Paruk | Ahmad Tohari          | 1982  | 1    | [Edit]   [Hapus]   |   |   |
|   |   +----------------------------------------------------------------------------------+   |   |
|   +------------------------------------------------------------------------------------------+   |
|                                                                                                  |
|                                  © 2026 SIMPUS-Mini — Jobsheet 3                                 |
+--------------------------------------------------------------------------------------------------+

3. Wireframe: Tambah Buku (buku/tambah.html)
+--------------------------------------------------------------------------------------------------+
| SIMPUS-Mini                                           Beranda  Daftar Buku  Tambah Buku  Anggota |
+--------------------------------------------------------------------------------------------------+
|                                                                                                  |
|   +------------------------------------------------------------------------------------------+   |
|   | Tambah Buku                                                                              |   |
|   |                                                                                          |   |
|   | Judul                                                                                    |   |
|   | [_________________________________]                                                      |   |
|   |                                                                                          |   |
|   | Pengarang                                                                                |   |
|   | [_________________________________]                                                      |   |
|   |                                                                                          |   |
|   | Tahun Terbit                                                                             |   |
|   | [_________________________________]                                                      |   |
|   |                                                                                          |   |
|   | ISBN                                                                                     |   |
|   | [_________________________________]                                                      |   |
|   |                                                                                          |   |
|   | Stok                                                                                     |   |
|   | [_________________________________]                                                      |   |
|   |                                                                                          |   |
|   | Kategori                                                                                 |   |
|   | [ Fiksi                         v ]                                                      |   |
|   |                                                                                          |   |
|   | [ Simpan ]                                                                               |   |
|   +------------------------------------------------------------------------------------------+   |
|                                                                                                  |
|                                  © 2026 SIMPUS-Mini — Jobsheet 3                                 |
+--------------------------------------------------------------------------------------------------+

4. Wireframe: Daftar Anggota (anggota/list.html)

+--------------------------------------------------------------------------------------------------+
| SIMPUS-Mini                                  Beranda  Daftar Buku  Daftar Anggota  Tambah Anggota|
+--------------------------------------------------------------------------------------------------+
|                                                                                                  |
|   +------------------------------------------------------------------------------------------+   |
|   | Daftar Anggota                                                                           |   |
|   |                                                                                          |   |
|   |   +----------------------------------------------------------------------------------+   |   |
|   |   | No. Anggota     | Nama            | Alamat        | No. HP     | Aksi            |   |   |
|   |   |-----------------+-----------------+---------------+------------+-----------------|   |   |
|   |   | A001            | Siti Aminah     | Malang        | 0812xxxx   | [Edit]  [Hapus] |   |   |
|   |   | A002            | Budi Santoso    | Batu          | 0813xxxx   | [Edit]  [Hapus] |   |   |
|   |   +----------------------------------------------------------------------------------+   |   |
|   +------------------------------------------------------------------------------------------+   |
|                                                                                                  |
|                                  © 2026 SIMPUS-Mini — Jobsheet 3                                 |
+--------------------------------------------------------------------------------------------------+