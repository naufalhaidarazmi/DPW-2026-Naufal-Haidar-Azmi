<?php
$title = "Dashboard Utama";
$base = ''; 
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/koneksi.php';

try {
    // 1. Hitung Total Judul Buku
    $stmtBuku = $pdo->query("SELECT COUNT(*) FROM buku");
    $totalBuku = $stmtBuku->fetchColumn();

    // 2. Hitung Total Anggota
    $stmtAnggota = $pdo->query("SELECT COUNT(*) FROM anggota");
    $totalAnggota = $stmtAnggota->fetchColumn();

    // 3. Hitung Total Akumulasi Stok Buku
    $stmtStok = $pdo->query("SELECT COALESCE(SUM(stok), 0) FROM buku");
    $totalStok = $stmtStok->fetchColumn();

    // 4. Hitung Buku dengan Stok Kritis (stok <= 3)
    $stmtKritis = $pdo->query("SELECT COUNT(*) FROM buku WHERE stok <= 3");
    $stokKritis = $stmtKritis->fetchColumn();

    // 5. Ambil 5 Buku Terbaru untuk Preview
    $stmtRecent = $pdo->query("SELECT * FROM buku ORDER BY id DESC LIMIT 5");
    $recentBooks = $stmtRecent->fetchAll();

} catch (PDOException $e) {
    $error = "Gagal mengambil data dashboard: " . $e->getMessage();
}
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Dashboard SIMPUS-Mini</h1>
        <p class="page-subtitle">Sistem Informasi Perpustakaan v2.0 berbasis PostgreSQL</p>
    </div>
    <div class="quick-actions">
        <a href="buku/tambah.php" class="btn btn-primary">+ Buku Baru</a>
        <a href="anggota/tambah.php" class="btn btn-secondary">+ Anggota Baru</a>
    </div>
</div>

<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<!-- Grid Kartu Statistik -->
<div class="stats-grid">
    <div class="stat-card border-indigo">
        <div class="stat-icon bg-indigo-light">📚</div>
        <div class="stat-details">
            <span class="stat-label">Total Judul Buku</span>
            <span class="stat-value"><?php echo number_format($totalBuku); ?></span>
        </div>
    </div>

    <div class="stat-card border-blue">
        <div class="stat-icon bg-blue-light">👥</div>
        <div class="stat-details">
            <span class="stat-label">Total Anggota</span>
            <span class="stat-value"><?php echo number_format($totalAnggota); ?></span>
        </div>
    </div>

    <div class="stat-card border-emerald">
        <div class="stat-icon bg-emerald-light">📦</div>
        <div class="stat-details">
            <span class="stat-label">Total Stok Fisik</span>
            <span class="stat-value"><?php echo number_format($totalStok); ?></span>
        </div>
    </div>

    <div class="stat-card border-amber">
        <div class="stat-icon bg-amber-light">⚠️</div>
        <div class="stat-details">
            <span class="stat-label">Stok Kritis (≤3)</span>
            <span class="stat-value text-amber"><?php echo number_format($stokKritis); ?></span>
        </div>
    </div>
</div>

<!-- Section Preview Buku Terbaru -->
<div class="card card-table">
    <div class="card-header">
        <h2>📖 Buku Terbaru Dambahkan</h2>
        <a href="buku/list.php" class="link-more">Lihat Semua Buku &rarr;</a>
    </div>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($recentBooks)): ?>
                    <?php foreach ($recentBooks as $buku): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($buku['judul']); ?></strong></td>
                            <td><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                            <td><?php echo htmlspecialchars($buku['tahun']); ?></td>
                            <td><span class="badge badge-category"><?php echo htmlspecialchars($buku['kategori'] ?? 'Umum'); ?></span></td>
                            <td>
                                <?php if ($buku['stok'] == 0): ?>
                                    <span class="badge badge-danger">Habis (0)</span>
                                <?php elseif ($buku['stok'] <= 3): ?>
                                    <span class="badge badge-warning">Kritis (<?php echo $buku['stok']; ?>)</span>
                                <?php else: ?>
                                    <span class="badge badge-success">Tersedia (<?php echo $buku['stok']; ?>)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data buku.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>