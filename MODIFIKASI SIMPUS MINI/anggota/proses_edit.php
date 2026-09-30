<?php
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = $_POST['id'] ?? null;
    $no_anggota = trim($_POST['no_anggota'] ?? '');
    $nama       = trim($_POST['nama'] ?? '');
    $alamat     = trim($_POST['alamat'] ?? '');
    $no_hp      = trim($_POST['no_hp'] ?? '');

    if ($id && !empty($no_anggota) && !empty($nama)) {
        try {
            $stmt = $pdo->prepare("UPDATE anggota SET no_anggota = :no_anggota, nama = :nama, alamat = :alamat, no_hp = :no_hp WHERE id = :id");
            $stmt->execute([
                'id'         => $id,
                'no_anggota' => $no_anggota,
                'nama'       => $nama,
                'alamat'     => $alamat,
                'no_hp'      => $no_hp
            ]);

            header("Location: list.php?status=updated");
            exit;
        } catch (PDOException $e) {
            die("Error memperbarui data anggota: " . $e->getMessage());
        }
    }
}
header("Location: list.php");
exit;