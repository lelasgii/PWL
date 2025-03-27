<?php
include '../config_07048.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: tblusers_07048.php");
    exit();
}

$id = intval($_GET['id']);
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();

if (!$user) {
    header("Location: tblusers_07048.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passw = mysqli_real_escape_string($conn, $_POST['passw']);

    if (!empty($passw)) {
        $passw = password_hash($passw, PASSWORD_DEFAULT);
        $conn->query("UPDATE users SET name='$name', email='$email', passw='$passw' WHERE id=$id");
    } else {
        $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    }

    header("Location: tblusers_07048.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
        }
        .card {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-orange {
            background-color: rgb(255, 128, 0);
            color: white;
            border: none;
        }
        .btn-orange:hover {
            background-color: rgb(230, 110, 0);
            transform: scale(1.05);
        }
        .btn-secondary:hover {
            background-color: #6c757d;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-primary mb-4">Edit Pengguna</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password (Kosongkan jika tidak ingin diubah):</label>
                    <input type="password" name="passw" class="form-control">
                </div>
                <button type="submit" class="btn btn-orange btn-custom">Update</button>
                <a href="tblusers_07048.php" class="btn btn-secondary btn-custom mt-2">Batal</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
