<?php
session_start();

// Membuat koneksi database
$conn = mysqli_connect("localhost", "root", "", "kikisalon");

// Mendapatkan booking ID yang dikirim dari halaman sebelumnya
if(isset($_POST['booking_id'])){
    $booking_id = $_POST['booking_id'];
    
    // Mendapatkan informasi booking berdasarkan booking ID
    $query = "SELECT * FROM booking WHERE ID_Booking = '$booking_id'";
    $result = $conn->query($query);
    $booking = $result->fetch_assoc();
}

// Jika tombol submit diklik untuk konfirmasi
if(isset($_POST['submit_confirmation'])){
    $booking_id = $_POST['booking_id'];
    $harga = $_POST['harga'];

    // Mengunggah foto transfer
    $foto_transfer_name = $_FILES['foto_transfer']['name'];
    $foto_transfer_temp = $_FILES['foto_transfer']['tmp_name'];
    $foto_transfer_destination = "img/transfer/" . $foto_transfer_name;

    // Pindahkan foto transfer ke folder uploads
    move_uploaded_file($foto_transfer_temp, $foto_transfer_destination);

    // Simpan informasi konfirmasi ke database
    $insertQuery = "INSERT INTO konfirmasi (ID_Booking, Harga, Foto_Transfer) VALUES ('$booking_id', '$harga', '$foto_transfer_destination')";
    $updateQuery = "UPDATE booking SET status = 'confirmed' WHERE ID_Booking = '$booking_id'";
    
    if ($conn->query($insertQuery) === TRUE && $conn->query($updateQuery) === TRUE) {
        echo "<script>alert('Pembayaran berhasil dikonfirmasi!');</script>";
        echo "<script>window.location.href='konfirmasibooking.php';</script>";
    } else {
        echo "Error in execution: " . $conn->error;
    }
}

// Menutup koneksi database
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking Pelanggan</title>
    <link rel="stylesheet" href="CSS/konfirmasi-pelanggan.css">
</head>
<body>
    <main class="main-container">
        <section class="confirmation-section">
            <h1 class="confirmation-title">Konfirmasi Booking Pelanggan</h1>
            <article class="booking-details">
                <h2>Detail Booking:</h2>
                <p><strong>Tanggal Booking:</strong> <?php echo $booking['Tanggal_Booking']; ?></p>
                <p><strong>Treatment:</strong> <?php echo $booking['treatment']; ?></p>
                <p><strong>Harga:</strong> Rp. <?php echo number_format($booking['Harga'], 0, ',', '.'); ?></p>
            </article>

            <article class="payment-confirmation">
                <h2>Konfirmasi Pembayaran:</h2>
                <form method="POST" enctype="multipart/form-data" class="payment-form">
                    <input type="hidden" name="booking_id" value="<?php echo $booking['ID_Booking']; ?>">
                    <input type="hidden" name="harga" value="<?php echo $booking['Harga']; ?>">
                    <label for="foto_transfer">Upload Foto Transfer:</label>
                    <input type="file" id="foto_transfer" name="foto_transfer" accept="image/*" required>
                    <button type="submit" name="submit_confirmation">Konfirmasi Pembayaran</button>
                </form>
            </article>
        </section>
    </main>
    <script src="JS/navigasi.js"></script>
</body>
</html>
