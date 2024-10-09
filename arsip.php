<?php
require 'db.php';

// Mulai sesi
session_start();
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
    <script src="JS/index.js"></script>
</head>
<body>

<script src="JS/navigasi.js"></script>

<main>
    <section class="section1" id="section1">
        <div>
            Kiki Salon Mengubah Tampilan dan Cara Hidupmu
        </div>
    </section>
    <section class="section2" id="section2">
            <div class="text">
                <h1>
                    Salon kecantikan dengan perawatan dan layanan premium
                </h1>
                <p>
                    <b>Kiki Salon(Mak Eka)</b>, Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi atque ad delectus, odio cupiditate laborum ipsum repudiandae? Harum eveniet iste voluptatibus quos dolor facere voluptatem dolore minima vel, magni ab.
                </p>   
            </div>
            <img src="img/section2.png" alt="KikiSalon">
        
    </section>
    <section class="section3" id="section3">
        <h1>Perawatan Lebih Hemat</h1>
        <div class="paket" id="paket1">
            <div class="img" id="paket1klik-img"></div>
            <div class="text">
                <h2 class="title" id="paket1klik-h21">
                    Paket Hemat 1
                </h2>
                <h2 class="sub" id="paket1klik-h22">
                    (Creambath + Cutting)
                </h2>
                <p>
                    Paket Hemat 1 berisi amet, consectetur adipiscing elit. In aliquam lectus ac convallis congue. Pellentesque sagittis posuere mauris quis vulputate. Morbi a ex sapien. Duis eget egestas nunc, sed ornare odio. Nulla porta porttitor justo. Donec efficitur enim nec gravida
                </p>
            </div>
        </div>

        <div class="paket" id="paket2">
            <div class="img" id="paket2klik-img"></div>
            <div class="text" >
                <h2 class="title" id="paket2klik-h21">
                    Paket Hemat 2
                </h2>
                <h2 class="sub" id="paket2klik-h22">
                    (Creambath + Cutting + Styling)
                </h2>
                <p> 
                    Paket Hemat 2 berisi sir amet, consectetur adipiscing elit. In aliquam lectus ac convallis congue. Pellentesque sagittis posuere mauris quis vulputate. Morbi a ex sapien. Duis eget egestas nunc, sed ornare odio. Nulla porta porttitor justo. Donec efficitur enim nec gravida
                </p>
            </div>
        </div>

        <div class="paket" id="paket3">
            <div class="img" id="paket3klik-img"></div>
            <div class="text">
                <h2 class="title" id="paket3klik-h21">
                    Paket Hemat 3
                </h2>
                <h2 class="sub" id="paket3klik-h22">
                    (Creambath + Cutting + Styling + Coloring)
                </h2>
                <p>
                    Paket Hemat 3 berisi sir amet, consectetur adipiscing elit. In aliquam lectus ac convallis congue. Pellentesque sagittis posuere mauris quis vulputate. Morbi a ex sapien. Duis eget egestas nunc, sed ornare odio. Nulla porta porttitor justo. Donec efficitur enim nec gravida
                </p>
            </div>
        </div>
    </section>
    <section class="section4" id="section4">
        <h1 >
            Nikmati Berbagai <br> Promo Menarik
        </h1>
        <div class="promo">
            <div class="box">
                <div class="text">
                    <h2>
                        PROMO SPECIAL!
                    </h2>
                    <h3>
                        REGISTER DAN DAPATKAN DISKON
                    </h3>
                    <h1>
                        30%
                    </h1>
                    <div class="button">
                        <a href="#">PESAN SEKARANG</a>
                    </div>
                </div>
                <div class="img"></div>
            </div>
            <div class="snk">
                <a href="">*syarat dan ketentuan berlaku</a>
            </div>
        </div>


    </section>
</main>
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
                        <a href="https://wa.me/+6282179406195">08xx-xxxx-xxxx</a>
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
                        <a href="#section1" class="scroll-link" data-target="section1">Home</a>
                    </li>
                    <li>
                        <a href="#section2" class="scroll-link" data-target="section2">Perawatan</a>
                    </li>
                    <li>
                        <a href="#section3" class="scroll-link" data-target="section3">Promo</a>
                    </li>
                    <li>
                        <a href="#section4" class="scroll-link" data-target="section4">Pesan</a>
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
</body>
</html>