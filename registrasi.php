<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["konfirmasi_password"]; // Mengambil nilai dari input konfirmasi kata sandi
    $namalengkap = $_POST["namalengkap"];

    // Cek apakah kata sandi dan konfirmasi kata sandi cocok
    if ($password !== $confirmPassword) {
        // Jika tidak cocok, tampilkan pesan error dan hentikan proses lebih lanjut
        echo "<script>alert('Kata sandi dan konfirmasi kata sandi tidak cocok.'); window.location='registrasi.php';</script>";
        exit();
    }

    // Jika kata sandi cocok, lanjutkan dengan penyimpanan data ke database
    $insertQuery = "INSERT INTO pelanggan (Nama_Klien, Email) VALUES ('$namalengkap', '$email')";

    if ($conn->query($insertQuery) === TRUE) {
        $user_id = $conn->insert_id;
        $insertDataQuery = "INSERT INTO login (ID_Klien, username, Email, Password, Register_Date, Status_Login) VALUES ('$user_id', '$username', '$email', '$password', CURDATE(), 0)";

        if ($conn->query($insertDataQuery) === TRUE) {
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Terjadi kesalahan saat mencoba menyimpan data login.'); window.location='registrasi.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Terjadi kesalahan saat mencoba menyimpan data pelanggan.'); window.location='registrasi.php';</script>";
        exit();
    }
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Kiki Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/css-reset-and-normalize@2.3.6/css/reset-and-normalize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/registrasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="JS/login.js"></script>
</head>
<body>
<div class="login-container">
    <div class="title">Buat Akun</div>
    <form action="registrasi.php" method="POST">
        <div class="form-isi">
            <div class="field-container">
                <img src="img/email.png" alt="Email Logo">
                <input type="email" id="email" name="email" placeholder="email">
            </div>
            
            <div class="field-container">
                <img src="img/user.png" alt="User Logo">
                <input type="text" id="namalengkap" name="namalengkap" placeholder="nama lengkap">
            </div>
            
            <div class="field-container">
                <img src="img/username.png" alt="Username Logo">
                <input type="text" id="username" name="username" placeholder="username">
            </div>
            
            <div class="field-container">
                <img src="img/lock.png" alt="Password Logo">
                <input type="password" id="password" name="password" placeholder="kata sandi">
            </div>
            
            <div class="field-container">
                <img src="img/lock.png" alt="Password Logo">
                <input type="password" id="konifirmasi_password" name="konfirmasi_password" placeholder="konfirmasi kata sandi">
            </div>
        </div>

        <input type="submit" value="Buat Akun">

        <div class="link">
            <div>Sudah punya akun? <a href="login.php">Masuk</a></div>
        </div>

    </form>
</div>

</body>
</html>