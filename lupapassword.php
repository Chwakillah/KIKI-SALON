
<?php
require 'db.php'; // Menghubungkan ke database
session_start();

// Cek apakah form telah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $email = $_POST['email']; // Mengambil input email
    $username = $_POST['username']; // Mengambil input username
    $newPassword = $_POST['new_password']; // Mengambil input kata sandi baru
    $confirmPassword = $_POST['konfirmasi_password']; // Mengambil input konfirmasi kata sandi

    // Periksa apakah kata sandi baru dan konfirmasi kata sandi cocok
    if ($newPassword != $confirmPassword) {
        echo "<script>alert('Kata sandi baru dan konfirmasi kata sandi tidak cocok.'); window.location='login.php';</script>";
        exit();
    }

    // Pertama, periksa apakah kombinasi email dan username ada dalam database
    $sql = "SELECT * FROM Login WHERE Email = '$email' AND username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Jika kombinasi email dan username ditemukan dalam database, lanjutkan untuk memperbarui kata sandi baru
        $updateSql = "UPDATE Login SET Password = '$newPassword' WHERE Email = '$email' AND username = '$username'";
        if ($conn->query($updateSql) === TRUE) {
            echo "<script>alert('Kata sandi berhasil diperbarui.'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $updateSql . "<br>" . $conn->error;
        }
    } else {
        // Jika tidak menemukan pengguna dengan kombinasi email dan username tersebut
        echo "<script>alert('Pengguna tidak ditemukan.'); window.location='login.php';</script>";
        exit();
    }

    $conn->close();
}
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
    <div class="title">Lupa Password</div>
    <form action="lupapassword.php" method="POST">
        <div class="form-isi">
            <div class="field-container">
                <img src="img/email.png" alt="Email Logo">
                <input type="text" id="email" name="email" placeholder="email">
            </div>
            
            <div class="field-container">
                <img src="img/user.png" alt="Old Password Logo">
                <input type="text" id="username" name="username" placeholder="username">
            </div>
            
            <div class="field-container">
                <img src="img/lock.png" alt="New Password Logo">
                <input type="password" id="new_password" name="new_password" placeholder="kata sandi baru">
            </div>
            
            <div class="field-container">
                <img src="img/lock.png" alt="Confirm Password Logo">
                <input type="password" id="konifirmasi_password" name="konfirmasi_password" placeholder="konfirmasi kata sandi">
            </div>
        </div>

        <input type="submit" value="Reset Password">

        <div class="link">
            <div>Sudah punya akun? <a href="login.php">Masuk</a></div>
            <div>Belum punya akun? <a href="registrasi.php">Daftar</a></div>
        </div>
        

    </form>
</div>
</body>
</html>