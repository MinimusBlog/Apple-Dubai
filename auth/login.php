<?php 
session_start();
?>

<?php 
if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login= '$login' AND password= '$password'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);

    if (!empty($user)) {
        $_SESSION['message'] = "Вы успешно авторизовались!";
        $_SESSION['loggedin'] = true;
        header("Location: /dashboard.php");
        exit();
    } else {
        $error_message = "Неверный логин или пароль!";
    }
}
?>

<?php if (empty($_SESSION['loggedin'])): ?>
    <form action="/auth/login.php" method="POST">
        <input name="login">
        <input name="password" type="password">
        <input type="submit">
    </form>
    <?php if (!empty($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
<?php endif; ?>