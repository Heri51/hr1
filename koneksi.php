<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'hr';

// Membuat koneksi database MySQL
$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

// Memastikan koneksi database terhubung atau error!
if (mysqli_connect_errno()) {
    echo "Database berhasil terhubung : " . mysqli_connect_error();
}
?>
