<?php
session_start();
//membuat koneksi data base
$conn = mysqli_connect("localhost","root","","kikisalon");

// Add new treatment
if(isset($_POST['addtreatment'])){
    $jenis_treatment = $_POST['jenis_treatment'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];

    // File upload handling
    $gambar = $_FILES['gambar']['name'];
    $temp_name = $_FILES['gambar']['tmp_name'];
    $folder = "img/ListTreatment/".$gambar;  // Adjust the path as per your configuration
    move_uploaded_file($temp_name, $folder);
    $addtreatment = mysqli_query($conn, "INSERT INTO treatment (Jenis_Treatment, Gambar, Keterangan, Harga) VALUES ('$jenis_treatment', '$folder', '$keterangan', '$harga')");
    if($addtreatment){
        echo "<script>alert('Treatment berhasil ditambahkan!');window.location.href='treatment.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan treatment.');window.location.href='treatment.php';</script>";
    }
}


//edit index
if (isset($_POST['editdatapelanggan'])) {
    $editId = $_POST['editId'];
    $editNamaPelanggan = $_POST['editNamaPelanggan'];
    $editAlamat = $_POST['editAlamat'];
    $editHandphone = $_POST['editHandphone'];

    mysqli_query($conn, "UPDATE pelanggan SET `Nama_Klien`='$editNamaPelanggan', Alamat='$editAlamat', `Handphone`='$editHandphone' WHERE ID_Klien='$editId'");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}else if (isset($_POST['edittreatment'])) {
    $editId = $_POST['editId'];
    $editjenistreatment = $_POST['editJenisTreatment'];
    $editketerangan = $_POST['editKeterangan'];
    $editharga = $_POST['editharga'];
    
    if (isset($_FILES['editgambar']) && $_FILES['editgambar']['error'] === UPLOAD_ERR_OK) {
        // File upload handling code
        $fileTmpPath = $_FILES['editgambar']['tmp_name'];
        $fileName = $_FILES['editgambar']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];
        
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './img/ListTreatment/';
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $editgambar = $dest_path;
            } else {
                $message = 'Error moving the file.';
                // Optionally, handle the error accordingly.
            }
        } else {
            $message = 'Upload failed. Allowed file types: ' . implode(', ', $allowedfileExtensions);
            // Optionally, handle the error accordingly.
        }
    } else {
        // No new file uploaded, keep the old image path
        $editgambar = $_POST['existingImage'];  // Assuming you pass the existing image path through the form
    }

    // Update the database record
    $query = "UPDATE treatment SET `Jenis_Treatment`='$editjenistreatment', Gambar='$editgambar', `Keterangan`='$editketerangan', Harga='$editharga' WHERE ID_Treatment='$editId'";
    mysqli_query($conn, $query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
else if (isset($_POST['editdataakun'])) {
    $editidlogin = $_POST['editId'];
    $editusername = $_POST['editUsername'];
    $editpassword = $_POST['editPassword'];

    mysqli_query($conn, "UPDATE login SET `ID_Login`='$editidlogin', username='$editusername', `Password`='$editpassword' WHERE ID_Login='$editidlogin'");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


//delete index
if (isset($_POST['deletepelanggan'])) {
    $deleteId = $_POST['deleteId'];
    mysqli_query($conn, "DELETE FROM pelanggan WHERE ID_Klien='$deleteId'");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}else if (isset($_POST['deletetreatment'])) {
    $deleteId = $_POST['deleteId'];
    mysqli_query($conn, "DELETE FROM treatment WHERE ID_Treatment='$deleteId'");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}




?>