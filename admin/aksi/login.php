<?php

// Sertakan file koneksi.php
require_once 'koneksi.php';

// Periksa apakah data login dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validasi input
    if (empty($email) || empty($password)) {
        echo "Harap isi email dan password.";
        redirect_with_delay('../login.php', 2);
    }

    // Persiapkan query untuk memeriksa username
    $stmt = $koneksi->prepare("SELECT id, password, name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Jalankan query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (md5($password) === $user['password']) {
            // Login berhasil
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['name'];
            echo "Login berhasil!";
            redirect_with_delay('../index.php', 2);
            exit;
        } else {
            echo "Password salah.";
            redirect_with_delay('../login.php', 2);
        }
    } else {
        echo "Username tidak ditemukan.";
        redirect_with_delay('../login.php', 2);
    }

    // Tutup statement
    $stmt->close();
} else {
    echo "Metode request tidak valid.";
    redirect_with_delay('../login.php', 2);
}

// Tutup koneksi
$koneksi->close();
