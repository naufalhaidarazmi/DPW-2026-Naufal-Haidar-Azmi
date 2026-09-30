<?php
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul     = trim($_POST['judul'] ?? '');
    $pengarang = trim($_POST['pengarang'] ?? '');
    $tahun     = (int)($_POST['tahun'] ?? date('Y'));
    $stok      = (int)($_POST['stok'] ?? 0);
    $isbn      = trim($_POST['isbn'] ?? '');
    $kategori  = trim($_POST['kategori'] ?? 'Umum');

    if (!empty($judul) && !empty($pengarang)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO buku (judul, pengarang, tahun, stok, isbn, kategori) VALUES (:judul, :pengarang, :tahun, :stok, :isbn, :kategori)");
            $stmt->execute([
                'judul'     => $judul,
                'pengarang' => $pengarang,
                'tahun'     => $tahun,
                'stok'      => $stok,
                'isbn'      => $isbn,
                'kategori'  => $kategori
            ]);

            header("Location: list.php?status=success");
            exit;
        } catch (PDOException $e) {
            die("Error menyimpan data: " . $e->getMessage());
        }
    } else {
        header("Location: tambah.php?error=empty_fields");
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}