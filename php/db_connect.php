<?php
// File: /php/db_connect.php

// Ganti detail ini sesuai dengan pengaturan server database Anda
$servername = "localhost";    // Biasanya "localhost" untuk XAMPP
$username = "root";           // Username database default XAMPP
$password = "";               // Password database default XAMPP (kosong)
$dbname = "kosiidin_db";      // Nama database yang Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    // Hentikan eksekusi dan tampilkan pesan error jika koneksi gagal
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Set karakter set ke utf8mb4 untuk mendukung berbagai karakter
$conn->set_charset("utf8mb4");

?>