<?php
// Deteksi direktori dasar untuk kompatibilitas path relatif
$base = isset($base) ? $base : '';
$title = isset($title) ? $title : 'SIMPUS-Mini';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> — SIMPUS-Mini v2.0</title>
    <!-- Font Google Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Stylesheet Utama (Pakai $base agar fleksibel dari subfolder mana pun) -->
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="<?php echo $base; ?>index.php" class="brand-logo">
                <span>📚</span> SIMPUS-Mini
            </a>
            <nav>
                <ul class="nav-links">
                    <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                    <li><a href="<?php echo $base; ?>buku/list.php">Daftar Buku</a></li>
                    <li><a href="<?php echo $base; ?>buku/tambah.php">Tambah Buku</a></li>
                    <li><a href="<?php echo $base; ?>anggota/list.php">Daftar Anggota</a></li>
                    <li><a href="<?php echo $base; ?>anggota/tambah.php">Tambah Anggota</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">