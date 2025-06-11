<?php
session_start(); // Mulai sesi
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil data user dari database
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Password benar, simpan data ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Arahkan ke halaman utama
            header("Location: ../index.php");
            exit();
        } else {
            // Password salah
            header("Location: ../login.php?error=Email atau password salah!");
            exit();
        }
    } else {
        // User tidak ditemukan
        header("Location: ../login.php?error=Email atau password salah!");
        exit();
    }
    
    $stmt->close();
    $conn->close();
}
?>