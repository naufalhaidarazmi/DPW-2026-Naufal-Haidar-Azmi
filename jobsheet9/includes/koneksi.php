<?php
$host     = 'localhost';
$port     = '5432';
$dbname   = 'simpus_db'; 
$user     = 'postgres';
$password = 'user123'; 

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // Matikan skrip dan tampilkan pesan error asli PostgreSQL
    die("<b>Koneksi PostgreSQL Gagal:</b> " . $e->getMessage());
}