<?php
session_start();
session_destroy();
setcookie("user_login", "", time() - 3600, "/");
header("Location: login.php");
exit();
?>