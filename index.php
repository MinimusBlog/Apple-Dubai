<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Техника Apple</title>
    <link rel="preconnect" href="https://googleapis.com" />
    <link rel="preconnect" href="https://gstatic.com" crossorigin />
    <link href="https://googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./styles/global.css" />
    <link rel="stylesheet" href="./styles/footer.css" />
    <link rel="stylesheet" href="./styles/header.css" />
    <link rel="stylesheet" href="./styles/components.css" />
    <link rel="stylesheet" href="./styles/page.css" />
</head>

<body>
    <header class="header">
        <div class="header__wrapper">
            <a href="#"><img class="header__logo" src="./images/logo.svg" alt="Логотип PurpleSchool" /></a>
            <nav>
                <ul class="menu">
                    <li class="menu__item menu__item_active"><a href="./pages/catalog.php">Apple</a></li>
                    <li class="menu__item"><a href="#">О нас</a></li>
                    <li class="menu__item"><a href="#">Блог</a></li>
                    <li class="menu__item"><a href="#">База знаний</a></li>
                </ul>
            </nav>
            <a class="header__login" href="auth/auth.php" aria-label="Избранное">
                <img src="./images/heart.svg" alt="Избранные товары"/>
            </a>
            <a class="header__login" href="./pages/cart.php" aria-label="Корзина">
                <img src="./images/shopping-cart.svg" alt="Корзина товаров"/>
            </a>
            <a class="header__login" href="auth/auth.php" aria-label="Вход в личный кабинет">
                <img src="./images/user.svg" alt="Иконка пользователя" />
                <div>Вход</div>
            </a>
            <button class="header__mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                <img src="./images/burger.svg" alt="Мобильное меню" />
            </button>
        </div>

    </header>
    <section class="section section_light">
        <div class="hero">
            <div class="hero__left">
                <h1 class="hero__h1">
                    Доступная техника Apple<br />
                    <span class="hero__h1_gradient">по России и СНГ</span>
                </h1>
                <div class="hero__cta">
                    <button class="button button_primary">Выбрать товар</button>
                    <button class="button button_ghost">О нас</button>
                </div>
            </div>
            <img class="hero__right" src="./images/video.png" alt="Видео техники" />
        </div>
    </section>
    <section class="section">
        <div class="section__wrapper">
            <div class="headling">
                <div class="headling__top">Выбрать технику</div>
                <h2 class="headling__buttom">Каталог товаров</h2>
            </div>
            <div class="chip_wrapper">
                <button class="chip chip_active">Все</button>
                <button class="chip">iPhone</button>
                <button class="chip">iPad</button>
                <button class="chip">Компьютеры</button>
                <button class="chip">Apple Watch</button>
            </div>
            <div class="courses_wrapper">
                <div class="course-card">
                    <div class="course-card__cover">
                        <img src="./images/cover.png" alt="Изображение курса">
                    </div>
                    <div class="course-card__body">
                        <div>
                            <div class="course-card__title">iPhone 15 Pro</div>
                            <div class="course-card__author">1Tb</div>
                        </div>
                        <div class="course-card__tags">
                            <span class="tag">
                                <img src="./images/star-icon.svg" alt="Иконка рейтинга">
                                4.9</span>
                            <span class="tag">Apple</span>
                        </div>
                    </div>
                    <div class="course-card__footer">
                        <div>от 110 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-card__cover">
                        <img src="./images/cover.png" alt="Изображение товара">
                    </div>
                    <div class="course-card__body">
                        <div>
                            <div class="course-card__title">iPad Air 13</div>
                            <div class="course-card__author">64 Gb</div>
                        </div>
                        <div class="course-card__tags">
                            <span class="tag">
                                <img src="./images/star-icon.svg" alt="Иконка рейтинга">
                                4.9</span>
                            <span class="tag">Apple</span>
                        </div>
                    </div>
                    <div class="course-card__footer">
                        <div>от 52 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-card__cover">
                        <img src="./images/cover.png" alt="Изображение курса">
                    </div>
                    <div class="course-card__body">
                        <div>
                            <div class="course-card__title">Macbook Air M1</div>
                            <div class="course-card__author">256 Gb</div>
                        </div>
                        <div class="course-card__tags">
                            <span class="tag">
                                <img src="./images/star-icon.svg" alt="Иконка рейтинга">
                                4.9</span>
                            <span class="tag">Apple</span>
                        </div>
                    </div>
                    <div class="course-card__footer">
                        <div>от 69 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-card__cover">
                        <img src="./images/cover.png" alt="Изображение курса">
                    </div>
                    <div class="course-card__body">
                        <div>
                            <div class="course-card__title">iMac 24' M4</div>
                            <div class="course-card__author">256 Gb</div>
                        </div>
                        <div class="course-card__tags">
                            <span class="tag">
                                <img src="./images/star-icon.svg" alt="Иконка рейтинга">
                                4.9</span>
                            <span class="tag">Apple</span>
                        </div>
                    </div>
                    <div class="course-card__footer">
                        <div>от 159 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-card__cover">
                        <img src="./images/cover.png" alt="Изображение курса">
                    </div>
                    <div class="course-card__body">
                        <div>
                            <div class="course-card__title">Apple Watch 9</div>
                            <div class="course-card__author">32 Gb</div>
                        </div>
                        <div class="course-card__tags">
                            <span class="tag">
                                <img src="./images/star-icon.svg" alt="Иконка рейтинга">
                                4.9</span>
                            <span class="tag">Apple</span>
                        </div>
                    </div>
                    <div class="course-card__footer">
                        <div>от 39 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    // Безопасное подключение файла
    $include_path = __DIR__ . '/includes/header.php';
    if (file_exists($include_path)) {
        include($include_path);
    } else {
        echo "<!-- Внимание: файл по пути {$include_path} не найден! -->";
    }
    ?>

    <footer class="footer">
        <div class="footer__wrapper">
            <div>Welcome to the Home Page</div>
        </div>
    </footer>
</body>

</html>