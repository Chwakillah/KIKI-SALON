<?php
require 'db.php';

// Mulai sesi
if (!isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Arahkan ke halaman login
    exit(); // Hentikan eksekusi skrip lebih lanjut
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
    <title>Kiki Salon</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/navigasi.css">
    <script src="JS/index.js"></script>
</head>
<footer>
    <div class="footer-atas">
        <div class="footer-kiri">
            <img src="img/KIKISalon.png" alt="Logo KikiSalon ">
            <p>Penyedia layanan potong rambut terbaik di indralaya</p>
        </div>
        <div class="footer-kanan">
            <div class="footer-sosmed">
                <h1>Sosial Media</h1>
                <ul class="sosmed">
                    <li>
                        <b>Whatsapp</b>
                    </li>
                    <li>
                        <a href="https://wa.me/+6283140883789">08xx-xxxx-xxxx</a>
                    </li>
                    <li>
                        <b>Instagram</b>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/kikisalon">@KikiSalonn_id</a>
                    </li>
                </ul>
            </div>
            <div class="footer-pages">
                <h1>Pages</h1>
                <ul class="pages">
                    <li>
                        <a href="index.php#section1" class="scroll-link" data-target="section1">Home</a>
                    </li>
                    <li>
                        <a href="index.php#section2" class="scroll-link" data-target="section2">Perawatan</a>
                    </li>
                    <li>
                        <a href="index.php#section3" class="scroll-link" data-target="section3">Promo</a>
                    </li>
                    <li>
                        <a href="index.php#section4" class="scroll-link" data-target="section4">Pesan</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="footer-bawah">
        <p>&#169; Copyright 2024 by Kiki Salon</p>
        <a href="">Terms of Service</a>
    </div>
</footer>
</html>