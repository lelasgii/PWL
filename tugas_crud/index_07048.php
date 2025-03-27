<?php
include 'config_07048.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Products & Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Sistem CRUD - Products & Users</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen Produk</h4>
                        <p class="card-text">Kelola produk dalam database.</p>
                        <a href="tabelproducts_07048.php" class="btn btn-primary">Lihat Produk</a>
                        <a href="createproducts_07048.php" class="btn btn-success">Tambah Produk</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen Pengguna</h4>
                        <p class="card-text">Kelola data pengguna dalam database.</p>
                        <a href="tbluser_07048.php" class="btn btn-primary">Lihat Users</a>
                        <a href="create_07048.php" class="btn btn-success">Tambah User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>