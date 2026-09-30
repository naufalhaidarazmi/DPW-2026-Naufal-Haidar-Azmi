<?php
$title = "Daftar Buku";
$base = "../";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/koneksi.php';

$search = $_GET['search'] ?? '';

try {
    if (!empty($search)) {
        $stmt = $pdo->prepare("SELECT * FROM buku WHERE judul ILIKE :search OR pengarang ILIKE :search ORDER BY id DESC");
        $stmt->execute(['search' => "%$search%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC");
    }
    $bukuList = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = "Gagal memuat data buku: " . $e->getMessage();
}
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Manajemen Data Buku</h1>
        <p class="page-subtitle">Kelola katalog dan status persediaan buku perpustakaan</p>
    </div>
    <div class="quick-actions">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Buku Baru</a>
    </div>
</div>

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] === 'success'): ?>
        <div class="alert alert-success" style="background: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            ✅ Buku berhasil ditambahkan!
        </div>
    <?php elseif ($_GET['status'] === 'updated'): ?>
        <div class="alert alert-success" style="background: #e0f2fe; color: #0369a1; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            ✏️ Data buku berhasil diperbarui!
        </div>
    <?php elseif ($_GET['status'] === 'deleted'): ?>
        <div class="alert alert-danger" style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            🗑️ Data buku berhasil dihapus dari database!
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="card">
    <div class="card-header" style="flex-wrap: wrap; gap: 1rem;">
        <h2>📚 Daftar Katalog Buku</h2>
        <form method="GET" style="display: flex; gap: 0.5rem; width: 100%; max-width: 360px;">
            <input type="text" name="search" placeholder="Cari judul / pengarang..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-secondary">Cari</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Status Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bukuList)): $no = 1; ?>
                    <?php foreach ($bukuList as $buku): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><strong><?php echo htmlspecialchars($buku['judul']); ?></strong></td>
                            <td><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                            <td><?php echo $buku['tahun']; ?></td>
                            <td><span class="badge badge-category"><?php echo htmlspecialchars($buku['kategori'] ?? 'Umum'); ?></span></td>
                            <td>
                                <?php if ($buku['stok'] > 3): ?>
                                    <span class="badge badge-success">Tersedia (<?php echo $buku['stok']; ?>)</span>
                                <?php elseif ($buku['stok'] > 0): ?>
                                    <span class="badge badge-warning">Kritis (<?php echo $buku['stok']; ?>)</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Habis</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $buku['id']; ?>" class="btn btn-secondary" style="padding: 0.3rem 0.6rem; font-size: 0.8rem;">✏️ Edit</a>
                                <a href="hapus.php?id=<?php echo $buku['id']; ?>" class="btn btn-danger btn-delete" style="padding: 0.3rem 0.6rem; font-size: 0.8rem; background: #ef4444; color: white;" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">🗑️ Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                            Tidak ada data buku yang ditemukan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>