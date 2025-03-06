<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
</head>
<body>
    <header>
        <?php if (!empty($_SESSION['auth'])): ?>
            <p>Приветствую, <?php echo htmlspecialchars($_SESSION['login']); ?>!</p>
        <?php else: ?>
            <a href="/auth/auth.php">Логин</a>
        <?php endif; ?>
    </header>
    <a href="../auth/logout.php">Logout</a>
</body>
</html>