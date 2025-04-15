<?php
session_start();
require 'config.php';
require 'csrf_token.php';

$message = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #e6f2e6;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        .bg-modern-green {
            background: #28a745;
        }
        .btn-modern-green {
            background-color: #28a745;
            border: none;
        }
        .btn-modern-green:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function validateForm() {
            const name = document.forms["regForm"]["name"].value;
            const email = document.forms["regForm"]["email"].value;
            const password = document.forms["regForm"]["password"].value;

            if (name === "" || email === "" || password === "") {
                alert("Semua field harus diisi!");
                return false;
            }

            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Email tidak valid!");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-modern-green text-white text-center">
                    <h4>Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <?php if ($message): ?>
                        <div class="alert alert-danger"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <form name="regForm" action="proses.php" method="POST" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Buat password" required>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <button type="submit" class="btn btn-modern-green w-100 text-white">Daftar Sekarang</button>
                    </form>
                </div>
                <div class="card-footer text-center text-muted">
                    <small>© 2025 | Dibuat oleh (A12.2023.07053) Laela Sugi Nurfatekhah</small>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>