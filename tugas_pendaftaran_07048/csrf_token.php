<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate token jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>