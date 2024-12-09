<?php

// Sertakan file koneksi.php
require_once 'koneksi.php';

// Tangani request berdasarkan aksi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'insert':
            $no = isset($_POST['no']) ? trim($_POST['no']) : '';
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $owner = isset($_POST['owner']) ? trim($_POST['owner']) : '';

            if (!empty($no) && !empty($name) && !empty($owner)) {
                $stmt = $koneksi->prepare("INSERT INTO payment_method (no, name, owner) VALUES (?,?,?)");
                $stmt->bind_param("sss", $no, $name, $owner);

                if ($stmt->execute()) {
                    echo "Data berhasil ditambahkan.";
                    redirect_with_delay('../metode-pembayaran.php', 2);
                } else {
                    echo "Gagal menambahkan data: " . $stmt->error;
                    redirect_with_delay('../metode-pembayaran.php', 2);
                }

                $stmt->close();
            } else {
                echo "Nama, nomor, atas nama tidak boleh kosong.";
                redirect_with_delay('../metode-pembayaran.php', 2);
            }
            break;


        case 'update':
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $no = isset($_POST['no']) ? trim($_POST['no']) : '';
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $owner = isset($_POST['owner']) ? trim($_POST['owner']) : '';

            if ($id > 0 && !empty($no) && !empty($name) && !empty($owner)) {
                $stmt = $koneksi->prepare("UPDATE payment_method SET no = ?, name = ?, owner = ? WHERE id = ?");
                $stmt->bind_param("sssi", $no,  $name, $owner, $id);

                if ($stmt->execute()) {
                    echo "Data berhasil diperbarui.";
                    redirect_with_delay('../metode-pembayaran.php', delay: 2);
                } else {
                    echo "Gagal memperbarui data: " . $stmt->error;
                    redirect_with_delay('../metode-pembayaran.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID, nama, nomor, atas nama tidak boleh kosong.";
                redirect_with_delay('../metode-pembayaran.php', 2);
            }
            break;


        case 'delete':
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

            if ($id > 0) {
                $stmt = $koneksi->prepare("DELETE FROM payment_method WHERE id = ?");
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "Data berhasil dihapus.";
                    redirect_with_delay('../metode-pembayaran.php', 2);
                } else {
                    echo "Gagal menghapus data: " . $stmt->error;
                    redirect_with_delay('../metode-pembayaran.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID tidak valid.";
                redirect_with_delay('../metode-pembayaran.php', 2);
            }
            break;

        default:
            echo "Aksi tidak dikenali.";
            redirect_with_delay('../metode-pembayaran.php', 2);
            break;
    }
} else {
    echo "Metode request tidak valid.";
    redirect_with_delay('../metode-pembayaran.php', 2);
}

// Tutup koneksi
$koneksi->close();
