<?php
session_start();

// Membuat koneksi database
$conn = mysqli_connect("localhost", "root", "", "kikisalon");

// Mendapatkan email pelanggan berdasarkan ID_Klien
$email_pelanggan = "";
$id_klien = $_SESSION['user_id'];
$sql_email = "SELECT Email FROM pelanggan WHERE ID_Klien = $id_klien";
$result_email = $conn->query($sql_email);
if ($result_email->num_rows > 0) {
    $row = $result_email->fetch_assoc();
    $email_pelanggan = $row['Email'];
}

// Memuat daftar treatment dari database
$query = "SELECT * FROM treatment";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    // Jika tidak ada treatment yang tersedia, arahkan kembali ke halaman sebelumnya atau beri pesan kesalahan
    header("Location: index.php");
    exit();
}

// Menyimpan semua treatment dalam sebuah array
$treatments = [];
while ($row = $result->fetch_assoc()) {
    $treatments[] = $row;
}

// Memastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_booking = $_POST['booking_date'];
    $selected_treatments = $_POST['treatments'];
    $total_harga = $_POST['total_harga_raw']; // Use the raw input here

    $selected_treatments_names = [];
    foreach ($selected_treatments as $treatment_id) {
        // Split the IDs if they contain commas
        $ids = explode(',', $treatment_id);
        foreach ($ids as $id) {
            // Trim to remove any accidental whitespace
            $id = trim($id);
            if (!empty($id)) {
                $sql_treatment = "SELECT Jenis_Treatment FROM treatment WHERE ID_Treatment IN ($id)";
                $result_treatment = $conn->query($sql_treatment);
                while ($row = $result_treatment->fetch_assoc()) {
                    $selected_treatments_names[] = $row['Jenis_Treatment'];
                }
            }
        }
    }

    $selected_treatments_str = implode(", ", $selected_treatments_names);

    // Prepare an INSERT statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO booking (ID_Klien, Email, Tanggal_Booking, Treatment, Harga, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("isssi", $id_klien, $email_pelanggan, $tanggal_booking, $selected_treatments_str, $total_harga);
    if ($stmt->execute()) {
        echo "<script>alert('Booking berhasil ditambahkan!');</script> ";
        echo "<script>window.location.href='konfirmasibooking.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="CSS/css1.css">
</head>
<script src="JS/navigasi.js"></script>
<body>    
    <main>
        <form class="form-container" method="POST">
            <h1 class="judul">Booking Treatment</h1>
            <input type="hidden" id="email" name="email" value="<?php echo $email_pelanggan; ?>">
            
            <label class="judul2" for="booking_date">Pilih Tanggal Booking:</label>
            <input type="date" id="booking_date" name="booking_date" value="<?php echo date('Y-m-d'); ?>"><br><br>
            
            <label for="treatments">Pilih Treatment:</label><br>
            <div class="treatment-container">
                <div>
                    <input type="checkbox" id="paket1" name="treatments[]" value="<?php echo $treatments[0]['ID_Treatment'] . ',' . $treatments[1]['ID_Treatment']; ?>" data-harga="<?php echo ($treatments[4]['Harga'] + $treatments[1]['Harga'])-($treatments[4]['Harga'] + $treatments[1]['Harga'])*0.2;  ?>">
                    <label class="checkbox-label" for="paket1">Paket 1 - <?php echo $treatments[0]['Jenis_Treatment'] . ', ' . $treatments[1]['Jenis_Treatment']; ?></label>
                </div>
                <div>
                    <input type="checkbox" id="paket2" name="treatments[]" value="<?php echo $treatments[0]['ID_Treatment'] . ',' . $treatments[1]['ID_Treatment'] . ',' . $treatments[2]['ID_Treatment']; ?>" data-harga="<?php echo ($treatments[4]['Harga'] + $treatments[1]['Harga'] + $treatments[2]['Harga'])-($treatments[4]['Harga'] + $treatments[1]['Harga'] + $treatments[2]['Harga'])*0.3;  ?>">
                    <label class="checkbox-label" for="paket2">Paket 2 - <?php echo $treatments[0]['Jenis_Treatment'] . ', ' . $treatments[1]['Jenis_Treatment'] . ', ' . $treatments[2]['Jenis_Treatment']; ?></label>
                </div>
                <div>
                    <input type="checkbox" id="paket3" name="treatments[]" value="<?php echo $treatments[0]['ID_Treatment'] . ',' . $treatments[1]['ID_Treatment'] . ',' . $treatments[2]['ID_Treatment'] . ',' . $treatments[3]['ID_Treatment']; ?>" data-harga="<?php echo ($treatments[4]['Harga'] + $treatments[1]['Harga'] + $treatments[2]['Harga'] + $treatments[0]['Harga'])-($treatments[4]['Harga'] + $treatments[1]['Harga'] + $treatments[2]['Harga'] + $treatments[0]['Harga'])*0.5;  ?>">
                    <label class="checkbox-label" for="paket3">Paket 3 - <?php echo $treatments[0]['Jenis_Treatment'] . ', ' . $treatments[1]['Jenis_Treatment'] . ', ' . $treatments[2]['Jenis_Treatment'] . ', ' . $treatments[3]['Jenis_Treatment']; ?></label>
                </div>
                <?php foreach ($treatments as $treatment): ?>
                    <div>
                        <input type="checkbox" id="treatment_<?php echo $treatment['ID_Treatment']; ?>" name="treatments[]" value="<?php echo $treatment['ID_Treatment']; ?>" data-harga="<?php echo $treatment['Harga']; ?>">
                        <label class="checkbox-label" for="treatment_<?php echo $treatment['ID_Treatment']; ?>"><?php echo $treatment['Jenis_Treatment']; ?> - Rp. <?php echo number_format($treatment['Harga'], 0, ',', '.'); ?></label><br>
                    </div>
                <?php endforeach; ?>
            </div>
            <br>
            
            <label for="total_harga">Total Harga:</label>
            <input type="text" id="total_harga" name="total_harga" readonly><br><br>
            
            <button type="submit" name="booking">Booking</button>
        </form>
    </main>
    <script>
const treatmentCheckboxes = document.querySelectorAll('.treatment-container input[type="checkbox"]');
const packageCheckboxes = document.querySelectorAll('input[type="checkbox"][id^="paket"]');
const individualTreatmentCheckboxes = document.querySelectorAll('input[type="checkbox"]:not([id^="paket"])');
const totalHargaInput = document.getElementById('total_harga');
const totalHargaRawInput = document.createElement('input');
totalHargaRawInput.type = 'hidden';
totalHargaRawInput.name = 'total_harga_raw';
document.querySelector('.form-container').appendChild(totalHargaRawInput);

function updateTotalHarga() {
    let totalHarga = 0;
    treatmentCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            totalHarga += parseFloat(checkbox.dataset.harga);
        }
    });
    totalHargaInput.value = "Rp " + totalHarga.toLocaleString('id-ID');
    totalHargaRawInput.value = totalHarga; // This will be the value sent to the server
}

packageCheckboxes.forEach(packageCheckbox => {
    packageCheckbox.addEventListener('change', () => {
        if (packageCheckbox.checked) {
            // Disable all other checkboxes
            treatmentCheckboxes.forEach(check => {
                if (check !== packageCheckbox) {
                    check.checked = false;
                    check.disabled = true;
                }
            });
        } else {
            // If no package is selected, re-enable all checkboxes
            let anyPackageChecked = Array.from(packageCheckboxes).some(c => c.checked);
            if (!anyPackageChecked) {
                treatmentCheckboxes.forEach(check => check.disabled = false);
            }
        }
        updateTotalHarga();
    });
});

individualTreatmentCheckboxes.forEach(individualCheckbox => {
    individualCheckbox.addEventListener('change', () => {
        // Check if any individual treatments are selected
        if (individualCheckbox.checked) {
            // Disable all package checkboxes
            packageCheckboxes.forEach(pck => {
                pck.checked = false;
                pck.disabled = true;
            });
        } else {
            // If no individual treatments are selected, check for re-enabling packages
            let anyTreatmentChecked = Array.from(individualTreatmentCheckboxes).some(c => c.checked);
            if (!anyTreatmentChecked) {
                packageCheckboxes.forEach(pck => pck.disabled = false);
            }
        }
        updateTotalHarga();
    });
});

// Call to update total initially if needed
updateTotalHarga();
</script>



</body>
</html>
