<?php

// Sertakan file koneksi.php
require_once 'koneksi.php';

// Tangani request berdasarkan aksi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'insert':
            $no = isset($_POST['no']) ? trim($_POST['no']) : '';
            $tipe = isset($_POST['tipe']) ? trim($_POST['tipe']) : '';
            $harga = isset($_POST['harga']) ? trim($_POST['harga']) : '';
            $status = isset($_POST['status']) ? trim($_POST['status']) : '';

            if (!empty($no) && !empty($tipe) && !empty($harga) && !empty($status)) {
                $stmt = $koneksi->prepare("INSERT INTO rooms (no, tipe, harga, status) VALUES (?,?,?,?)");
                $stmt->bind_param("ssss", $no, $tipe, $harga, $status);

                if ($stmt->execute()) {
                    echo "Data berhasil ditambahkan.";
                    redirect_with_delay('../kamar.php', 2);
                } else {
                    echo "Gagal menambahkan data: " . $stmt->error;
                    redirect_with_delay('../kamar.php', 2);
                }

                $stmt->close();
            } else {
                echo "Nomor, tipe, harga, status tidak boleh kosong.";
                redirect_with_delay('../kamar.php', 2);
            }
            break;


        case 'update':
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
            $no = isset($_POST['no']) ? trim($_POST['no']) : '';
            $tipe = isset($_POST['tipe']) ? trim($_POST['tipe']) : '';
            $harga = isset($_POST['harga']) ? trim($_POST['harga']) : '';
            $status = isset($_POST['status']) ? trim($_POST['status']) : '';

            if ($id > 0 && !empty($no) && !empty($tipe) && !empty($harga) && !empty($status)) {
                $stmt = $koneksi->prepare("UPDATE rooms SET no = ?, tipe = ?, harga = ?, status = ? WHERE id = ?");
                $stmt->bind_param("sssssi", $no, $tipe, $harga, $status, $id);

                if ($stmt->execute()) {
                    echo "Data berhasil diperbarui.";
                    redirect_with_delay('../kamar.php', 2);
                } else {
                    echo "Gagal memperbarui data: " . $stmt->error;
                    redirect_with_delay('../kamar.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID, nomor, tipe, harga, status tidak boleh kosong.";
                redirect_with_delay('../kamar.php', 2);
            }
            break;


        case 'delete':
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

            if ($id > 0) {
                $stmt = $koneksi->prepare("DELETE FROM rooms WHERE id = ?");
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "Data berhasil dihapus.";
                    redirect_with_delay('../kamar.php', 2);
                } else {
                    echo "Gagal menghapus data: " . $stmt->error;
                    redirect_with_delay('../kamar.php', 2);
                }

                $stmt->close();
            } else {
                echo "ID tidak valid.";
                redirect_with_delay('../kamar.php', 2);
            }
            break;

        default:
            echo "Aksi tidak dikenali.";
            redirect_with_delay('../kamar.php', 2);
            break;
    }
} else {
    echo "Metode request tidak valid.";
    redirect_with_delay('../kamar.php', 2);
}

// Tutup koneksi
$koneksi->close();
