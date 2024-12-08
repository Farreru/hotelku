<?php

// Sertakan file koneksi.php
require_once 'koneksi.php';

// Tangani request berdasarkan aksi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'insert':
            $address = isset($_POST['address']) ? trim($_POST['address']) : '';
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

            if (!empty($name) && !empty($email) && !empty($password) && !empty($address) && !empty($phone)) {
                // Enkripsi password dengan MD5
                $password = md5($password);

                $stmt = $koneksi->prepare("INSERT INTO customers (name, email, password, address, phone) VALUES (?,?,?,?,?)");
                $stmt->bind_param("sssss", $name, $email, $password, $address, $phone);

                if ($stmt->execute()) {
                    echo "Data berhasil ditambahkan.";
                    redirect_with_delay('../customer.php', 2);
                } else {
                    echo "Gagal menambahkan data: " . $stmt->error;
                    redirect_with_delay('../customer.php', 2);
                }

                $stmt->close();
            } else {
                echo "Nama, email, password, address, phone tidak boleh kosong.";
                redirect_with_delay('../customer.php', 2);
            }
            break;


        case 'update':
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $address = isset($_POST['address']) ? trim($_POST['address']) : '';
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

            if ($id > 0 && !empty($name) && !empty($email) && !empty($address) && !empty($phone)) {
                // Enkripsi password jika diinputkan
                if (!empty($password)) {
                    $password = md5($password); // Menggunakan MD5 untuk mengenkripsi password
                    $stmt = $koneksi->prepare("UPDATE customers SET name = ?, email = ?, password = ?, address = ?, phone = ? WHERE id = ?");
                    $stmt->bind_param("sssssi", $name, $email, $password, $address, $phone, $id);
                } else {
                    // Jika password tidak diinput, hanya update nama dan email
                    $stmt = $koneksi->prepare("UPDATE customers SET name = ?, email = ?, address = ?, phone = ? WHERE id = ?");
                    $stmt->bind_param("ssssi", $name, $email, $address, $phone, $id);
                }

                if ($stmt->execute()) {
                    echo "Data berhasil diperbarui.";
                    redirect_with_delay('../customer.php', 2);
                } else {
                    echo "Gagal memperbarui data: " . $stmt->error;
                    redirect_with_delay('../customer.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID, nama, email, password, address, phone tidak boleh kosong.";
                redirect_with_delay('../customer.php', 2);
            }
            break;


        case 'delete':
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

            if ($id > 0) {
                $stmt = $koneksi->prepare("DELETE FROM customers WHERE id = ?");
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "Data berhasil dihapus.";
                    redirect_with_delay('../customer.php', 2);
                } else {
                    echo "Gagal menghapus data: " . $stmt->error;
                    redirect_with_delay('../customer.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID tidak valid.";
                redirect_with_delay('../customer.php', 2);
            }
            break;

        default:
            echo "Aksi tidak dikenali.";
            redirect_with_delay('../customer.php', 2);
            break;
    }
} else {
    echo "Metode request tidak valid.";
    redirect_with_delay('../customer.php', 2);
}

// Tutup koneksi
$koneksi->close();
