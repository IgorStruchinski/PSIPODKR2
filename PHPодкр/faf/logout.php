<?php
session_start();
session_unset();
session_destroy();

// Удалить cookie
setcookie('username', '', time() - 3600, "/");

header("Location: login.php");
exit();
?>