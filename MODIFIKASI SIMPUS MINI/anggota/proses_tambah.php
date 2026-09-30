<?php
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_anggota = trim($_POST['no_anggota'] ?? '');
    $nama       = trim($_POST['nama'] ?? '');
    $alamat     = trim($_POST['alamat'] ?? '');
    $no_hp      = trim($_POST['no_hp'] ?? '');

    if (!empty($no_anggota) && !empty($nama)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO anggota (no_anggota, nama, alamat, no_hp) VALUES (:no_anggota, :nama, :alamat, :no_hp)");
            $stmt->execute([
                'no_anggota' => $no_anggota,
                'nama'       => $nama,
                'alamat'     => $alamat,
                'no_hp'      => $no_hp
            ]);

            header("Location: list.php?status=success");
            exit;
        } catch (PDOException $e) {
            die("Error menyimpan data anggota: " . $e->getMessage());
        }
    } else {
        header("Location: tambah.php?error=empty_fields");
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}