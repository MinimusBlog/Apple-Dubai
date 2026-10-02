<?php
include '../includes/db.php';
session_start();

$loginError = $passwordError = $confirmError = $emailError = $generalError = $authError = "";

// Определяем, какая вкладка должна быть активной по умолчанию
// или если были ошибки в одной из форм
$activeTab = 'login'; // По умолчанию активна вкладка авторизации

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        // Регистрация
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $email = $_POST['email'];

        // Ваши существующие проверки и логика регистрации
        if (empty($login) || empty($password) || empty($confirm) || empty($email)) {
            $generalError = "Все поля обязательны для заполнения!";
            $activeTab = 'register'; // Активируем вкладку регистрации при ошибке
        } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $login)) {
            $loginError = "Логин может содержать только буквы и цифры!";
            $activeTab = 'register';
        } elseif (strlen($login) < 4 || strlen($login) > 10) {
            $loginError = "Длина логина должна быть от 4 до 10 символов!";
            $activeTab = 'register';
        } elseif (strlen($password) < 6 || strlen($password) > 12) {
            $passwordError = "Длина пароля должна быть от 6 до 12 символов!";
            $activeTab = 'register';
        } elseif ($password != $confirm) {
            $confirmError = "Пароли не совпадают!";
            $activeTab = 'register';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Неверный формат Email!";
            $activeTab = 'register';
        } else {
            $check_query = "SELECT * FROM users WHERE login='$login'";
            $result = mysqli_query($link, $check_query);

            if (mysqli_num_rows($result) == 0) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (login, password, email) VALUES ('$login', '$hashedPassword', '$email')";
                if (mysqli_query($link, $query)) {
                    $user_id = mysqli_insert_id($link);
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $login;
                    $_SESSION['id'] = $user_id;
                    header("Location: ../auth/lk.php");
                    exit();
                } else {
                    $generalError = "Ошибка регистрации. Попробуйте снова.";
                    $activeTab = 'register';
                }
            } else {
                $loginError = "Логин уже занят. Выберите другой.";
                $activeTab = 'register';
            }
        }
    } elseif (isset($_POST['login_submit'])) {
        // Авторизация
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Ваши существующие проверки и логика авторизации
        if (!empty($login) && !empty($password)) {
            $query = "SELECT * FROM users WHERE login='$login'";
            $res = mysqli_query($link, $query);
            $user = mysqli_fetch_assoc($res);

            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['message'] = "Вы успешно авторизовались!";
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $login;
                    $_SESSION['id'] = $user['id'];
                    header("Location: ../auth/lk.php");
                    exit();
                } else {
                    $authError = "Неверный логин или пароль!";
                    $activeTab = 'login';
                }
            } else {
                $authError = "Неверный логин или пароль!";
                $activeTab = 'login';
            }
        } else {
            $authError = "Все поля обязательны для заполнения!";
            $activeTab = 'login';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="../styles/header.css" />
    <link rel="stylesheet" href="../styles/components.css" />
    <style>
        .form-label {
            color: var(--color-text);
        }
        .card-title {
            font-weight: 700;
            color: var(--color-text);
        }
        .btn {
            padding: 14px 24px;
            color: var(--color-text);
            background: none;
            border: none;
            font-weight: 400;
            font-size: 18px;
            line-height: 120%;
            border-radius: var(--border-10);
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }
        .btn-primary {
            background: var(--color-primary);
        }

        .btn-primary:hover {
            background: var(--color-primary-hover);
        }
        .btn-success {
            background: var(--color-primary);
            &:hover {
                background: var(--color-primary-hover);
            }
        }
        .nav-link {
            color: var(--color-primary);
        }
    </style>
</head>
<body>
<header class="header">
        <div class="header__wrapper">
            <a href="../index.php"><img class="header__logo" src="../images/logo.svg" alt="Логотип Apple Dubai" /></a>
            <nav>
                <ul class="menu">
                    <li class="menu__item menu__item_active"><a href="#">Apple</a></li>
                    <li class="menu__item"><a href="#">О нас</a></li>
                    <li class="menu__item"><a href="#">Блог</a></li>
                    <li class="menu__item"><a href="#">База знаний</a></li>
                </ul>
            </nav>
            <a class="header__login" href="auth/auth.php" aria-label="Избранное">
                <img src="../images/heart.svg" alt="Избранные товары"/>
            </a>
            <a class="header__login" href="auth/auth.php" aria-label="Корзина">
                <img src="../images/shopping-cart.svg" alt="Корзина товаров"/>
            </a>
            <a class="header__login" href="auth/auth.php" aria-label="Вход в личный кабинет">
                <img src="../images/user.svg" alt="Иконка пользователя" />
                <div>Вход</div>
            </a>
            <button class="header__mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                <img src="../images/burger.svg" alt="Мобильное меню" />
            </button>
        </div>

    </header>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="max-width: 500px; width: 100%;">
            <ul class="nav nav-tabs justify-content-center mb-4" id="authTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo ($activeTab == 'login') ? 'active' : ''; ?>" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="<?php echo ($activeTab == 'login') ? 'true' : 'false'; ?>">Авторизация</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo ($activeTab == 'register') ? 'active' : ''; ?>" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="<?php echo ($activeTab == 'register') ? 'true' : 'false'; ?>">Регистрация</button>
                </li>
            </ul>
            <div class="tab-content" id="authTabContent">
                <div class="tab-pane fade <?php echo ($activeTab == 'login') ? 'show active' : ''; ?>" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <h2 class="card-title text-center mb-4">Войти</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="loginAuth" class="form-label">Логин</label>
                            <input type="text" class="form-control <?php echo ($authError && empty($_POST['login'])) ? 'is-invalid' : ''; ?>" id="loginAuth" name="login" placeholder="Введите логин" value="<?php echo htmlspecialchars($_POST['login'] ?? ''); ?>">
                            <?php if ($authError && empty($_POST['login'])): ?>
                                 <div class="invalid-feedback">
                                    <?php echo $authError; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="passwordAuth" class="form-label">Пароль</label>
                            <input type="password" class="form-control <?php echo ($authError && empty($_POST['password'])) ? 'is-invalid' : ''; ?>" id="passwordAuth" name="password" placeholder="Введите пароль">
                            <?php if ($authError && empty($_POST['password'])): ?>
                                <div class="invalid-feedback">
                                    <?php echo $authError; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($authError && (!empty($_POST['login']) && !empty($_POST['password']))): // Если ошибка не из-за пустых полей, показать общее сообщение ?>
                            <div class="alert alert-danger mb-3" role="alert">
                                <?php echo $authError; ?>
                            </div>
                        <?php endif; ?>
                        <div class="d-grid">
                            <button type="submit" name="login_submit" class="btn btn-success">Войти</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade <?php echo ($activeTab == 'register') ? 'show active' : ''; ?>" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <h2 class="card-title text-center mb-4">Зарегистрироваться</h2>
                    <form action="" method="POST">
                        <?php if ($generalError): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $generalError; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="regLogin" class="form-label">Логин</label>
                            <input type="text" class="form-control <?php echo ($loginError) ? 'is-invalid' : ''; ?>" id="regLogin" name="login" placeholder="Введите логин" value="<?php echo htmlspecialchars($_POST['login'] ?? ''); ?>">
                            <?php if ($loginError): ?>
                                <div class="invalid-feedback">
                                    <?php echo $loginError; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="regPassword" class="form-label">Пароль</label>
                            <input type="password" class="form-control <?php echo ($passwordError) ? 'is-invalid' : ''; ?>" id="regPassword" name="password" placeholder="Введите пароль">
                            <?php if ($passwordError): ?>
                                <div class="invalid-feedback">
                                    <?php echo $passwordError; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="regConfirm" class="form-label">Подтвердите пароль</label>
                            <input type="password" class="form-control <?php echo ($confirmError) ? 'is-invalid' : ''; ?>" id="regConfirm" name="confirm" placeholder="Подтвердите пароль">
                            <?php if ($confirmError): ?>
                                <div class="invalid-feedback">
                                    <?php echo $confirmError; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="regEmail" class="form-label">Email</label>
                            <input type="email" class="form-control <?php echo ($emailError) ? 'is-invalid' : ''; ?>" id="regEmail" name="email" placeholder="Введите Email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                            <?php if ($emailError): ?>
                                <div class="invalid-feedback">
                                    <?php echo $emailError; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>