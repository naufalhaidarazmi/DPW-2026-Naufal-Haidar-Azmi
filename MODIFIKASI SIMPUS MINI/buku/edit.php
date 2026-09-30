<?php
$title = "Edit Data Buku";
$base = "../";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM buku WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $buku = $stmt->fetch();

    if (!$buku) {
        header("Location: list.php?error=not_found");
        exit;
    }
} catch (PDOException $e) {
    die("Gagal mengambil data buku: " . $e->getMessage());
}
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Edit Data Buku</h1>
        <p class="page-subtitle">Perbarui informasi buku di katalog perpustakaan</p>
    </div>
    <div class="quick-actions">
        <a href="list.php" class="btn btn-secondary">&larr; Batal</a>
    </div>
</div>

<div class="card" style="max-width: 650px; margin: 0 auto; padding: 2rem;">
    <form action="proses_edit.php" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
        <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Judul Buku *</label>
            <input type="text" name="judul" required value="<?php echo htmlspecialchars($buku['judul']); ?>">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Pengarang *</label>
            <input type="text" name="pengarang" required value="<?php echo htmlspecialchars($buku['pengarang']); ?>">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Tahun Terbit *</label>
                <input type="number" name="tahun" required value="<?php echo $buku['tahun']; ?>">
            </div>
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Jumlah Stok *</label>
                <input type="number" name="stok" min="0" required value="<?php echo $buku['stok']; ?>">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nomor ISBN</label>
                <input type="text" name="isbn" value="<?php echo htmlspecialchars($buku['isbn'] ?? ''); ?>">
            </div>
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Kategori</label>
                <input type="text" name="kategori" value="<?php echo htmlspecialchars($buku['kategori'] ?? 'Umum'); ?>">
            </div>
        </div>

        <div style="margin-top: 1rem; display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary" style="flex: 1;">Simpan Perubahan</button>
            <a href="list.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>