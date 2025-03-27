<?php
session_start();
if (!isset($_SESSION["user_id"]) && !isset($_COOKIE["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_role = $_SESSION["role"] ?? "user";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Selamat datang di Dashboard!</h2>
    <p>Anda login sebagai <b><?= $user_role ?></b></p>

    <?php if ($user_role == "admin") : ?>
        <a href="admin_panel.php" class="btn btn-warning">Panel Admin</a>
    <?php endif; ?>

    <a href="logout.php" class="btn btn-danger">Logout</a>
</body>
</html>