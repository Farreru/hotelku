<?php

session_start();

// Konfigurasi database
$host = 'localhost'; // Host database
$user = 'root';      // Username database
$pass = '';          // Password database
$db   = 'hotelku'; // Nama database

// Membuat koneksi
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    // echo "Koneksi berhasil!";
}

function redirect_with_delay($url, $delay = 0)
{
    if ($delay > 0) {
        header("Refresh: $delay; url=$url");
    } else {
        header("Location: $url");
    }
    exit;
}
