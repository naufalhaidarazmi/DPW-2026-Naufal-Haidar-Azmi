<?php
$title = "Edit Data Anggota";
$base = "../";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM anggota WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $anggota = $stmt->fetch();

    if (!$anggota) {
        header("Location: list.php?error=not_found");
        exit;
    }
} catch (PDOException $e) {
    die("Gagal mengambil data anggota: " . $e->getMessage());
}
?>

<div class="dashboard-header">
    <div>
        <h1 class="page-title">Edit Data Anggota</h1>
        <p class="page-subtitle">Perbarui informasi data keanggotaan</p>
    </div>
    <div class="quick-actions">
        <a href="list.php" class="btn btn-secondary">&larr; Batal</a>
    </div>
</div>

<div class="card" style="max-width: 650px; margin: 0 auto; padding: 2rem;">
    <form action="proses_edit.php" method="POST" style="display: flex; flex-direction: column; gap: 1.25rem;">
        <input type="hidden" name="id" value="<?php echo $anggota['id']; ?>">

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nomor Anggota *</label>
            <input type="text" name="no_anggota" required value="<?php echo htmlspecialchars($anggota['no_anggota']); ?>" style="font-weight: 600; color: var(--primary);">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nama Lengkap *</label>
            <input type="text" name="nama" required value="<?php echo htmlspecialchars($anggota['nama']); ?>">
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Alamat</label>
            <textarea name="alamat" rows="3"><?php echo htmlspecialchars($anggota['alamat'] ?? ''); ?></textarea>
        </div>

        <div>
            <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nomor HP / WhatsApp</label>
            <input type="text" name="no_hp" value="<?php echo htmlspecialchars($anggota['no_hp'] ?? ''); ?>">
        </div>

        <div style="margin-top: 1rem; display: flex; gap: 0.75rem;">
            <button type="submit" class="btn btn-primary" style="flex: 1;">Simpan Perubahan</button>
            <a href="list.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>