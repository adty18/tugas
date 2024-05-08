<?php
$host = 'localhost'; // sesuaikan dengan host database Anda
$username = 'root'; // sesuaikan dengan username database Anda
$password = ''; // sesuaikan dengan password database Anda
$database = 'tugas'; // sesuaikan dengan nama database Anda

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>
