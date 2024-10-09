<?php
require 'db.php';

// Mulai sesi
session_start();


// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {  
    $userId = $_SESSION['user_id'];
    $sqluser = "SELECT * FROM pelanggan WHERE ID_Klien = '$userId'";
    $result = $conn->query($sqluser);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Nama_Klien = $row['Nama_Klien'];
    }else{
        $Nama_Klien = "Login";
    }
}else{
    header("Location: login.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/css-reset-and-normalize@2.3.6/css/reset-and-normalize.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navigasi.css">
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="menu">
                <a href="#section1" class="scroll-link" data-target="section1"><img src="img/KIKISalon.png" alt="logo kikisalon"></a>
            </div>
            <div class="menu-empat-menu">
                <div class="menu-link">
                    <a href="index.php#section1" class="scroll-link" data-target="section1">Home</a>
                </div>
                <div class="menu-link">
                    <a href="index.php#section2" class="scroll-link" data-target="section2">Perawatan</a>
                </div>
                <div class="menu-link">
                    <a href="index.php#section3" class="scroll-link" data-target="section3">Promo</a>
                </div>
                <div class="menu-link">
                    <a href="index.php#section4" class="scroll-link" data-target="section4">Pesan</a>
                </div>
            </div>
            <div class="login">
                <div class="login-user">
                    <img src="img/userfill-putih.png" alt="logo-user">
                    <div><?php echo $Nama_Klien; ?></div>
                </div>
                <div class="login-overlay" id="login-overlay">
                    <a href="profil.php">Profil</a>
                    <a href="logout.php">Log Out</a>
                
                </div>
            </div>


        </div>
</nav>
</header>

</body>
</html>

