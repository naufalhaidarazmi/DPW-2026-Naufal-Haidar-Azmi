<?php
$title = "Tambah Buku Baru";
$base = "../";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Tambah Buku Baru</h1>
        <p class="page-subtitle">Masukkan rincian buku ke dalam basis data SIMPUS-Mini</p>
    </div>
    <div class="quick-actions">
        <a href="list.php" class="btn btn-secondary">&larr; Kembali ke Daftar Buku</a>
    </div>
</div>

<div class="card" style="max-width: 650px; margin: 0 auto; padding: 2rem;">
    <form action="proses_tambah.php" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Judul Buku *</label>
            <input type="text" name="judul" required placeholder="Masukkan judul buku..." style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Pengarang *</label>
            <input type="text" name="pengarang" required placeholder="Nama penulis/pengarang..." style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Tahun Terbit *</label>
                <input type="number" name="tahun" required min="1900" max="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>" style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
            </div>
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Jumlah Stok *</label>
                <input type="number" name="stok" required min="0" value="1" style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
            </div>
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nomor ISBN (Opsional)</label>
            <input type="text" name="isbn" placeholder="Contoh: 978-602-0000-00-0" style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Kategori Buku</label>
            <input type="text" name="kategori" placeholder="Contoh: Pemrograman, Sains, Novel..." style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
        </div>

        <div style="margin-top: 1rem; display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary" style="flex: 1;">Simpan Data Buku</button>
            <a href="list.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>