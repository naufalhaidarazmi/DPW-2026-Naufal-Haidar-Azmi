<?php
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;

if ($id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM anggota WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: list.php?status=deleted");
        exit;
    } catch (PDOException $e) {
        die("Gagal menghapus data anggota: " . $e->getMessage());
    }
} else {
    header("Location: list.php");
    exit;
}