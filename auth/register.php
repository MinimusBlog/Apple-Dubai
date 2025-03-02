<?php  
    <form action="" method="POST">
        <input name="login">
        <input name="password" type="password">
        <input type="submit">
    </form>

    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = "INSERT INTO users SET login='login', password='password'";
        mysqli_query($link, $query);
    } 
?>