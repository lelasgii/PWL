<?php
include '../config_07048.php';
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: tblusers.php");
?>
