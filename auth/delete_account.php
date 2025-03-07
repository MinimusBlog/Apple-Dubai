<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['auth'])) {
    header("Location: ../auth/auth.php");
    exit();
}

$deleteError = $deleteSuccess = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE id='$id'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);

    if ($user && password_verify($password, $user['password'])) {
        $delete_query = "DELETE FROM users WHERE id='$id'";
        if (mysqli_query($link, $delete_query)) {
            session_destroy();
            header("Location: ../auth/auth.php");
            exit();
        } else {
            $deleteError = "Failed to delete account. Please try again.";
        }
    } else {
        $deleteError = "Incorrect password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Account</title>
</head>
<body>
    <h1>Delete Account</h1>
    <?php if ($deleteError) echo "<p style='color:red;'>$deleteError</p>"; ?>
    <?php if ($deleteSuccess) echo "<p style='color:green;'>$deleteSuccess</p>"; ?>
    <form action="" method="POST">
        <input type="password" name="password" placeholder="Enter your password to confirm">
        <input type="submit" value="Delete Account">
    </form>
    <a href="../auth/lk.php">Back to LK</a>
</body>
</html>