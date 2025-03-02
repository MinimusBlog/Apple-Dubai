<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website</title>
</head>
<body>
    <header>
        <?php if (!empty($_SESSION['auth'])): ?>
            <p>Приветствую, <?php echo $_SESSION['login']; ?>!</p>
        <?php else: ?>
            <a href="/auth/login.php">Логин</a>
        <?php endif; ?>
    </header>
</body>
</html>