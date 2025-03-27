<?php
include 'config_07048.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $conn->real_escape_string($_POST['nama_produk']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $stok = $conn->real_escape_string($_POST['stok']);

    $query = "INSERT INTO products (nama_produk, harga, stok) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $nama_produk, $harga, $stok);
    
    if ($stmt->execute()) {
        header("Location: tabelproducts_07048.php");
        exit();
    } else {
        echo "Gagal menambah produk.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Produk</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="tabelproducts_07048.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>