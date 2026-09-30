<?php
$title = "Daftar Anggota";
$base = "../";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/koneksi.php';

$search = $_GET['search'] ?? '';

try {
    if (!empty($search)) {
        $stmt = $pdo->prepare("SELECT * FROM anggota WHERE nama ILIKE :search OR no_anggota ILIKE :search ORDER BY id DESC");
        $stmt->execute(['search' => "%$search%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM anggota ORDER BY id DESC");
    }
    $anggotaList = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = "Gagal memuat data anggota: " . $e->getMessage();
}
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Manajemen Data Anggota</h1>
        <p class="page-subtitle">Kelola informasi keanggotaan perpustakaan SIMPUS-Mini</p>
    </div>
    <div class="quick-actions">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Anggota Baru</a>
    </div>
</div>

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] === 'success'): ?>
        <div class="alert alert-success" style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            ✅ Data anggota berhasil ditambahkan!
        </div>
    <?php elseif ($_GET['status'] === 'updated'): ?>
        <div class="alert alert-success" style="background: #e0f2fe; color: #0369a1; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            ✏️ Data anggota berhasil diperbarui!
        </div>
    <?php elseif ($_GET['status'] === 'deleted'): ?>
        <div class="alert alert-danger" style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            🗑️ Data anggota berhasil dihapus!
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="card">
    <div class="card-header" style="flex-wrap: wrap; gap: 1rem;">
        <h2>👥 Direktori Anggota</h2>
        <form method="GET" style="display: flex; gap: 0.5rem; width: 100%; max-width: 360px;">
            <input type="text" name="search" placeholder="Cari nama / no. anggota..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-secondary">Cari</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($anggotaList)): $no = 1; ?>
                    <?php foreach ($anggotaList as $anggota): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><span class="badge badge-category"><?php echo htmlspecialchars($anggota['no_anggota']); ?></span></td>
                            <td><strong><?php echo htmlspecialchars($anggota['nama']); ?></strong></td>
                            <td><?php echo htmlspecialchars($anggota['alamat'] ?? '-'); ?></td>
                            <td><code><?php echo htmlspecialchars($anggota['no_hp'] ?? '-'); ?></code></td>
                            <td>
                                <a href="edit.php?id=<?php echo $anggota['id']; ?>" class="btn btn-secondary" style="padding: 0.3rem 0.6rem; font-size: 0.8rem;">✏️ Edit</a>
                                <a href="hapus.php?id=<?php echo $anggota['id']; ?>" class="btn btn-danger btn-delete" style="padding: 0.3rem 0.6rem; font-size: 0.8rem; background: #ef4444; color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">🗑️ Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                            Tidak ada data anggota yang ditemukan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>