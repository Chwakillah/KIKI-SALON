<?php
require 'db.php'; // Menghubungkan dengan file koneksi database

session_start(); // Mulai sesi

// Cek apakah pengguna sudah login dan memiliki id sesi
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; // Ambil id pengguna dari sesi

    // Query untuk menghapus pengguna dari database berdasarkan id
    $sql = "DELETE FROM pelanggan WHERE ID_Klien = '$userId'";

    if ($conn->query($sql) === TRUE) {
        // Jika penghapusan berhasil, hancurkan sesi dan alihkan ke halaman login
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        // Jika penghapusan gagal, tampilkan pesan kesalahan
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Jika pengguna tidak login, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

$conn->close(); // Tutup koneksi database
?>
