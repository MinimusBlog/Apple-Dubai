<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apple_dubai";

// Создание подключения
$link = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>