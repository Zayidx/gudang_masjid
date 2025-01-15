<?php
$host = 'localhost';
$user = 'root'; //username phpmyadmin default 'root'
$password = ''; //password phpmyadmin default ''
$database = 'masjid'; //nama database 

// Mengkoneksi kan ke database
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die('Koneksi Gagal: ' . $conn->connect_error);
}
?>
