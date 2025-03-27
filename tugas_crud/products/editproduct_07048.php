<?php
include 'config_07048.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $conn->real_escape_string($_POST['nama_produk']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $stok = $conn->real_escape_string($_POST['stok']);

    $query = "UPDATE products SET nama_produk = ?, harga = ?, stok = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siii", $nama_produk, $harga, $stok, $id);

    if ($stmt->execute()) {
        header("Location: tabelproducts_07048.php");
        exit();
    } else {
        echo "Gagal mengedit produk.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Produk</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= $product['nama_produk'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="<?= $product['harga'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="<?= $product['stok'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="tabelproducts_07048.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>