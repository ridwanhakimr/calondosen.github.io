<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Sesuaikan dengan password MySQL Anda
$database = 'calondosen'; // Nama database Anda

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>