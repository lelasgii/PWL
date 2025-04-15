<?php
session_start();
require 'config.php';

// Validasi CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF token tidak valid!");
}

// Ambil dan filter input
$name     = htmlspecialchars(trim($_POST['name']));
$email    = htmlspecialchars(trim($_POST['email']));
$password = trim($_POST['password']);

// Validasi data kosong
if (empty($name) || empty($email) || empty($password)) {
    die("Semua field wajib diisi.");
}

// Cek email sudah terdaftar atau belum
$check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $check->close();
    die("Email sudah digunakan. Silakan gunakan email lain.");
}
$check->close();

// Hash password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Simpan data ke database
$stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashedPassword);

if ($stmt->execute()) {
    header("Location: success.php");
    exit;
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>