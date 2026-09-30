<?php
$title = "Tambah Anggota Baru";
$base = "../";
require_once __DIR__ . '/../includes/header.php';

// Generate otomatis usulan nomor anggota unik
$autoNoAnggota = 'ANG-' . date('Ymd') . '-' . rand(100, 999);
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Tambah Anggota Baru</h1>
        <p class="page-subtitle">Registrasikan anggota perpustakaan baru ke dalam basis data</p>
    </div>
    <div class="quick-actions">
        <a href="list.php" class="btn btn-secondary">&larr; Kembali ke Daftar Anggota</a>
    </div>
</div>

<div class="card" style="max-width: 650px; margin: 0 auto; padding: 2rem;">
    <form action="proses_tambah.php" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nomor Anggota *</label>
            <input type="text" name="no_anggota" required value="<?php echo $autoNoAnggota; ?>" style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px; font-weight: 600; color: var(--primary);">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nama Lengkap *</label>
            <input type="text" name="nama" required placeholder="Masukkan nama lengkap anggota..." style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Alamat</label>
            <textarea name="alamat" rows="3" placeholder="Alamat domisili anggota..." style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;"></textarea>
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nomor HP / WhatsApp</label>
            <input type="text" name="no_hp" placeholder="Contoh: 08123456789" style="width: 100%; padding: 0.65rem; border: 1px solid var(--border-color); border-radius: 8px;">
        </div>

        <div style="margin-top: 1rem; display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary" style="flex: 1;">Simpan Data Anggota</button>
            <a href="list.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>