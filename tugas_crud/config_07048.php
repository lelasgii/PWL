<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "crud_db"; 

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
