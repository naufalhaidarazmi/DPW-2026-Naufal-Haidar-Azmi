<?php
$host     = 'localhost';
$port     = '5432';
$dbname   = 'simpus_db'; 
$user     = 'postgres';
$password = 'postgres';  

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // Supaya Vercel tidak crash/layar putih saat localhost mati
    $pdo = null;
    // Peringatan halus tanpa mematikan HTML/CSS
    echo '<div style="background:#fef3c7; color:#92400e; padding:1rem; text-align:center; font-family:sans-serif;">
            ⚠️ <strong>Mode Demo Vercel:</strong> Database lokal tidak terhubung ke Cloud. Jalankan secara lokal untuk akses database penuh.
          </div>';
}