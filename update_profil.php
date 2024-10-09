<?php
session_start();
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if the form data is submitted
if (isset($_POST['editprofil'])) {
    $user_id = $_SESSION['user_id'];
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $alamat = $_POST['address'];
    $handphone = $_POST['phone'];
    $password = $_POST['password']; // Not hashing as per request

    // Prepare the update query for client information
    $query = "UPDATE pelanggan SET Nama_Klien=?, Email=?, Alamat=?, Handphone=? WHERE ID_Klien=?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        // Handle this error in a user-friendly way
        echo "<script>alert('Error preparing database.'); window.location.href='profil.php';</script>";
        exit;
    }

    // Bind parameters and execute
    $stmt->bind_param('ssssi', $nama, $email, $alamat, $handphone, $user_id);
    $stmt->execute();
    $stmt->close();

    // Update password directly if it's provided
    if (!empty($password)) {
        $stmt = $conn->prepare("UPDATE login SET `Password`=? WHERE ID_Klien=?");
        $stmt->bind_param('si', $password, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect on success
    echo "<script>alert('Profile updated successfully.'); window.location.href='profil.php';</script>";
}
?>
