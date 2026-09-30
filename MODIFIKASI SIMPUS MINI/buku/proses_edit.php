<?php
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = $_POST['id'] ?? null;
    $judul     = trim($_POST['judul'] ?? '');
    $pengarang = trim($_POST['pengarang'] ?? '');
    $tahun     = (int)($_POST['tahun'] ?? 0);
    $stok      = (int)($_POST['stok'] ?? 0);
    $isbn      = trim($_POST['isbn'] ?? '');
    $kategori  = trim($_POST['kategori'] ?? 'Umum');

    if ($id && !empty($judul) && !empty($pengarang)) {
        try {
            $stmt = $pdo->prepare("UPDATE buku SET judul = :judul, pengarang = :pengarang, tahun = :tahun, stok = :stok, isbn = :isbn, kategori = :kategori WHERE id = :id");
            $stmt->execute([
                'id'        => $id,
                'judul'     => $judul,
                'pengarang' => $pengarang,
                'tahun'     => $tahun,
                'stok'      => $stok,
                'isbn'      => $isbn,
                'kategori'  => $kategori
            ]);

            header("Location: list.php?status=updated");
            exit;
        } catch (PDOException $e) {
            die("Error memperbarui data buku: " . $e->getMessage());
        }
    }
}
header("Location: list.php");
exit;