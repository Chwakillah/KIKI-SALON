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
    <link rel="stylesheet" href="CSS/treatment_user.css">
</head>
<body>

<script src="JS/navigasi.js"></script>

<main>
    <div class="treatment-atas"><img src="img/treatment-atas.png" alt=""></div>
    <div class="treatment-section1">
        <h1>PERAWATAN</h1>
        <div class ="treatment-section1-button">
            <div class="sec1-adv" onclick="window.location.href='bookingpelanggan.php'">Booking Sekarang</div>
        </div>
    </div>
    <div class="treatment-section2">
        <h1>Popular Product</h1>
        <div class="listimg">
        <?php 
			$qry4=mysqli_query($conn,"SELECT * FROM treatment ORDER BY Jenis_Treatment");
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
    </div>
</main>
<?php include('footer.php');?>
</body>
</html>