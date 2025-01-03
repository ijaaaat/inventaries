<?php
$host = 'localhost';
$db = 'inventaris_db'; // Nama database yang telah Anda buat
$user = 'root'; // Username database Anda
$pass = ''; // Password database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>