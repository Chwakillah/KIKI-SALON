<?php
session_start();
require 'db.php'; // Pastikan Anda telah memiliki file ini yang berisi koneksi ke database

// Redirect jika pengguna belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM pelanggan WHERE ID_Klien = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/profil.css">
    <script src="JS/profil.js"></script>
</head>
<body>
    <div class="navigation">
        <ul>
            <li><a href="index.php"><img src="img/Left-Arrow.png" alt="Back"></a></li>
        </ul>
    </div>
    <div class="container">
        <div class="profile-header">
            <img src="img/Profile-Logo.png" alt="Profile Logo">
            <h1>Profile</h1>
            <div class="profile-picture"></div>
            <span id="edit-profile-pic" style="display: none;">Pilih<br>Foto</span>
        </div>
        <div class="profile">
        <form method="POST" action="update_profil.php">
            <div class="profile-info">
                <!-- Nama Lengkap -->
                <div class="info-item">
                    <label for="name-input" class="label">Nama Lengkap</label><br>
                    <input type="text" id="name-input" name ="name" style="display: none;" value="<?php echo htmlspecialchars($user['Nama_Klien']); ?>">
                    <span id="name-field" class="highlight"><?php echo htmlspecialchars($user['Nama_Klien']); ?></span>
                </div>
                <!-- Email -->
                <div class="info-item">
                    <label for="email-input" class="label">Email</label><br>
                    <input type="email" id="email-input" name="email" style="display: none;" value="<?php echo htmlspecialchars($user['Email']); ?>">
                    <span id="email-field" class="highlight"><?php echo htmlspecialchars($user['Email']); ?></span>
                </div>
                <!-- Alamat -->
                <div class="info-item">
                    <label for="address-input" class="label">Alamat</label><br>
                    <input type="text" id="address-input" name="address" style="display: none;" value="<?php echo htmlspecialchars($user['Alamat']); ?>">
                    <span id="address-field" class="highlight"><?php echo htmlspecialchars($user['Alamat']); ?></span>
                </div>
                <!-- Nomor Telepon -->
                <div class="info-item">
                    <label for="phone-input" class="label">Nomor Telepon</label><br>
                    <input type="tel" id="phone-input" name="phone" style="display: none;" value="<?php echo htmlspecialchars($user['Handphone']); ?>">
                    <span id="phone-field" class="highlight"><?php echo htmlspecialchars($user['Handphone']); ?></span>
                </div>
                <!-- Password (dummy placeholder) -->
                <div class="info-item">
                    <label for="password-input" class="label">Password</label><br>
                    <input type="password" id="password-input" name="password" style="display: none;" placeholder="Masukkan password">
                    <span id="password-field" class="highlight">**********</span>
                </div>
            </div>

            <div class="profile-actions">
                <button type="button" id="edit-button">Edit</button>
                <button type="button" id="cancel-button" style="display: none;">Cancel</button>
                <button type ="submit" id="save-button" style="display: none;" name="editprofil" >Save</button>
            </div>
        </div>
        </form>
    </div>

    <script src="JS/profil.js"></script>
</body>
</html>
