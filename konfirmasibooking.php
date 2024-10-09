<?php
// Membuat koneksi database
$conn = mysqli_connect("localhost", "root", "", "kikisalon");

// Mendapatkan data booking pelanggan
$query = "SELECT * FROM booking";
$result = $conn->query($query);

$bookings = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
} else {
    $bookings = null; // Tidak ada booking
}

if(isset($_POST['cancel_booking'])){
    $booking_id = $_POST['booking_id'];
    
    // Cek apakah ada konfirmasi untuk booking ini
    $checkConfirm = "SELECT * FROM konfirmasi WHERE ID_Booking = $booking_id";
    $confirmResult = $conn->query($checkConfirm);
    
    if($confirmResult->num_rows > 0) {
        // Hapus dulu dari tabel konfirmasi
        $deleteConfirm = "DELETE FROM konfirmasi WHERE ID_Booking = $booking_id";
        $conn->query($deleteConfirm);
    }
    
    // Lakukan proses pembatalan booking
    $query = "DELETE FROM booking WHERE ID_Booking = $booking_id";
    if($conn->query($query) === TRUE){
        echo "<script>alert('Booking berhasil dibatalkan!');</script>";
        echo "<script>window.location.href='konfirmasibooking.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
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
    <title>Daftar Booking Pelanggan</title>
    <link rel="stylesheet" href="CSS/konfirmasi-booking.css">
</head>
<body>
<script src="JS/navigasi.js"></script>
    <div class="struk-container">
        <div class="struk-header">
            <h1>List Booking</h1>
        </div>
        <?php if ($bookings): ?>
            <table class="struk-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Booking</th>
                    <th>Treatment</th>
                    <th>Status</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $index => $booking): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $booking['Tanggal_Booking'] ?></td>
                    <td><?= $booking['treatment'] ?></td>
                    <td><?= $booking['status'] ?></td>
                    <td>Rp. <?= number_format($booking['Harga'], 0, ',', '.') ?></td>
                    <td>
                        <div class="button-container">
                            <?php if ($booking['status'] === 'pending'): ?>
                                <form method="POST" action="konfirmasipelanggan.php">
                                    <input type="hidden" name="booking_id" value="<?= $booking['ID_Booking'] ?>">
                                    <button type="submit" name="confirm_booking" class="struk-button">Konfirmasi</button>
                                </form>
                            <?php endif; ?>
                            <form method="POST" action="">
                                <input type="hidden" name="booking_id" value="<?= $booking['ID_Booking'] ?>">
                                <button type="submit" name="cancel_booking" class="struk-button">Batalkan</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php else: ?>
            <p class="struk-total">Tidak ada booking.</p>
        <?php endif; ?>
    </div>
</body>
</html>
