<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Langsung menggunakan data dari $_POST tanpa sanitasi atau validasi
    $query = "SELECT * FROM login WHERE username = '$username' AND Password = '$password'";
    $result = $conn->query($query);
    $Admin = $row['ID_Admin'];
    
    // Cek apakah email dan password cocok
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['ID_Klien'];
        $_SESSION['username'] = $row['username'];

        $querylogin = "UPDATE login SET Status_Login = 1 WHERE username = '$username' AND Password = '$password'";
        
        $resultlogin = $conn->query($querylogin);


        // Cek apakah email dan password cocok
        if($Admin == 1){
            header("Location: dashboard.php");
        }else{
            header("Location: index.php");
        }
        exit();
    } else {
        $query = "SELECT * FROM Admin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['ID_Admin']; // Simpan user_id ke dalam session
            $_SESSION['username'] = $row['username']; // Simpan username ke dalam session

            header("Location: dashboard.php");
            exit();
        }else{
            $_SESSION['login_error'] = "Email atau password salah";
            header("Location: login.php");
            exit();
        }

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
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="JS/login.js"></script>
</head>
<body>
<div class="login-container">
    <div class="title">Masuk</div>
    <form action="login.php" method="POST">
        <div class="field-container">
            <img src="img/user.png" alt="Username Logo">
            <input type="text" id="username" name="username" placeholder="username">
        </div>
        
        <div class="field-container">
            <img src="img/lock.png" alt="Password Logo">
            <input type="password" id="password" name="password" placeholder="kata sandi">
        </div>
        <div class="link">
            <a href="lupapassword.php">Lupa Password?</a>
        </div>
        <input type="submit" value="Login">
    </form>
    <div class="link">
        <div>Belum punya akun? <a href="registrasi.php">Buat Akun</a></div>
    </div>
</div>

</body>
</html>