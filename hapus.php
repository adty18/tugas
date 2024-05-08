<?php
include 'crud.php';

// Ambil ID tugas dari parameter URL
$id = $_GET['id'];

// Hapus tugas berdasarkan ID
hapusTugas($id);

// Redirect kembali ke halaman utama setelah berhasil hapus
header("Location: index.php");
exit();
?>
