<?php
require 'db.php';
session_start();

$username = $_SESSION['username'];
$querylogout = "UPDATE login SET Status_Login = 0 , Latest_Login = CURDATE() WHERE username = '$username'";
$resultlogin = $conn->query($querylogout);


session_destroy();
header('location:login.php');
?>