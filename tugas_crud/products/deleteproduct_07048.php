<?php
include 'config_07048.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: tabelproducts_07048.php");
        exit();
    } else {
        echo "Gagal menghapus produk.";
    }
}
?>