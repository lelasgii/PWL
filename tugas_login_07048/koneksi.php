<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan konfigurasi MySQL
$pass = "";
$db = "auth_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>