<?php
session_start();
$_SESSION['auth'] = null;
$_SESSION['login'] = null;
$_SESSION['message'] = "Вы успешно вышли из системы!";
header("Location: /index.php");
exit();
?>