<?php
require 'db.php';

// Mulai sesi
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Arahkan ke halaman login
    exit(); // Hentikan eksekusi skrip lebih lanjut
}



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
    <script src="JS/navigasi.js"></script>
</head>
<body>

<main>
    <section class="section1" id="section1">
        <div>
            Kiki Salon Mengubah Tampilan dan Cara Hidupmu
        </div>
    </section>
    <section class="section2" id="section2">
        <div class="text">
            <h1>
                List Perawatan
            </h1>
            <p>*Harga tergantung kondisi rambut anda</p>   
        </div>

        <div class="listimg">
        <?php 
			$qry4=mysqli_query($conn,"SELECT * FROM treatment ORDER BY rand() LIMIT 3");
			while($nm=mysqli_fetch_array($qry4)){
		?>
		<div class="listimg1">
			<img src="<?php echo $nm['Gambar'];?>" alt=""/>
            <div class= "textimg">
                <h2><?php echo $nm['Jenis_Treatment'];?></h2>
                <p>Rp<?php echo number_format($nm['Harga'], 0, ',', '.');?></p>
            </div>
		</div>
		<?php
		}
		?>
        </div>
        <div class ="button">
            <div class="sec2-adv" onclick="window.location.href='treatment_user.php'">Perawatan Lainnya</div>
            <div class="sec2-adv" onclick="window.location.href='bookingpelanggan.php'">Booking Sekarang</div>
        </div>

    </section>
    <section class="section3" id="section3">
        <h1>Perawatan Lebih Hemat</h1>
        <div class="container">
            
            <div class="paket" id="paket1">
                
                <div class="img"></div>
                <div class="text">
                    <h2 class="title">
                        Paket Hemat 1
                    </h2>
                    <h2 class="sub">
                        (Creambath + Cutting)
                    </h2>
                    <p>
                        Paket Hemat 1 berisi amet, consectetur adipiscing elit. In aliquam lectus ac convallis congue. Pellentesque sagittis posuere mauris quis vulputate. Morbi a ex sapien. Duis eget egestas nunc, sed ornare odio. Nulla porta porttitor justo. Donec efficitur enim nec gravida
                    </p>
                </div>
            </div>

            <div class="paket" id="paket2">
                <div class="img"></div>
                <div class="text" >
                    <h2 class="title">
                        Paket Hemat 2
                    </h2>
                    <h2 class="sub">
                        (Creambath + Cutting + Styling)
                    </h2>
                    <p> 
                        Paket Hemat 2 berisi sir amet, consectetur adipiscing elit. In aliquam lectus ac convallis congue. Pellentesque sagittis posuere mauris quis vulputate. Morbi a ex sapien. Duis eget egestas nunc, sed ornare odio. Nulla porta porttitor justo. Donec efficitur enim nec gravida
                    </p>
                </div>
            </div>

            <div class="paket" id="paket3">
                <div class="img"></div>
                <div class="text">
                    <h2 class="title">
                        Paket Hemat 3
                    </h2>
                    <h2 class="sub">
                        (Creambath + Cutting + Styling + Coloring)
                    </h2>
                    <p>
                        Paket Hemat 3 berisi sir amet, consectetur adipiscing elit. In aliquam lectus ac convallis congue. Pellentesque sagittis posuere mauris quis vulputate. Morbi a ex sapien. Duis eget egestas nunc, sed ornare odio. Nulla porta porttitor justo. Donec efficitur enim nec gravida
                    </p>
                </div>
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
<?php include('footer.php');?>
</body>
</html>