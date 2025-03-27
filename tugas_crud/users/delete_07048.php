<?php
include 'config_07048.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: tbluser_07048.php");
        exit();
    } else {
        echo "Gagal menghapus pengguna.";
    }
}
?>