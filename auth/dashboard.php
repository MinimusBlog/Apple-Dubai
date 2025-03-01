<?php 
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: /auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <?php 
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>
    <h1>Добро пожаловать!</h1>
</body>
</html>