<?php

// Sertakan file koneksi.php
require_once 'koneksi.php';

// Tangani request berdasarkan aksi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch ($action) {
        case 'insert':
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            if (!empty($name) && !empty($email) && !empty($password)) {
                // Enkripsi password dengan MD5
                $password = md5($password);

                $stmt = $koneksi->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $password);

                if ($stmt->execute()) {
                    echo "Data berhasil ditambahkan.";
                    redirect_with_delay('../pengguna.php', 2);
                } else {
                    echo "Gagal menambahkan data: " . $stmt->error;
                    redirect_with_delay('../pengguna.php', 2);
                }

                $stmt->close();
            } else {
                echo "Nama, email, dan password tidak boleh kosong.";
                redirect_with_delay('../pengguna.php', 2);
            }
            break;


        case 'update':
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            if ($id > 0 && !empty($name) && !empty($email)) {
                // Enkripsi password jika diinputkan
                if (!empty($password)) {
                    $password = md5($password); // Menggunakan MD5 untuk mengenkripsi password
                    $stmt = $koneksi->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
                    $stmt->bind_param("sssi", $name, $email, $password, $id);
                } else {
                    // Jika password tidak diinput, hanya update nama dan email
                    $stmt = $koneksi->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
                    $stmt->bind_param("ssi", $name, $email, $id);
                }

                if ($stmt->execute()) {
                    echo "Data berhasil diperbarui.";
                    redirect_with_delay('../pengguna.php', 2);
                } else {
                    echo "Gagal memperbarui data: " . $stmt->error;
                    redirect_with_delay('../pengguna.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID, nama, dan email tidak boleh kosong.";
                redirect_with_delay('../pengguna.php', 2);
            }
            break;


        case 'delete':
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            if ($id > 0) {
                $stmt = $koneksi->prepare("DELETE FROM users WHERE id = ?");
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "Data berhasil dihapus.";
                    redirect_with_delay('../pengguna.php', 2);
                } else {
                    echo "Gagal menghapus data: " . $stmt->error;
                    redirect_with_delay('../pengguna.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID tidak valid.";
                redirect_with_delay('../pengguna.php', 2);
            }
            break;

        default:
            echo "Aksi tidak dikenali.";
            redirect_with_delay('../pengguna.php', 2);
            break;
    }
} else {
    echo "Metode request tidak valid.";
    redirect_with_delay('../pengguna.php', 2);
}

// Tutup koneksi
$koneksi->close();
