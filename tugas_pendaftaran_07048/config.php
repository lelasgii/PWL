<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "secure_register";

$mysqli = new mysqli($host, $user, $pass, $dbname);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>