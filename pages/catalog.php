<?php
session_start();

$products = [
    [
        'id' => 1, // Unique ID for iPhone 15 Pro
        'name' => 'iPhone 15 Pro',
        'author' => '1Tb',
        'price' => 'от 110 000',
        'image' => '../images/cover.png',
        'category' => 'iPhone'
    ],
    [
        'id' => 2, // Unique ID for iPhone SE (2022)
        'name' => 'iPhone SE (2022)',
        'author' => '64Gb',
        'price' => 'от 45 000',
        'image' => '../images/cover.png',
        'category' => 'iPhone'
    ],
    [
        'id' => 3, // Unique ID for iPad Air 13
        'name' => 'iPad Air 13',
        'author' => '64 Gb',
        'price' => 'от 52 000',
        'image' => '../images/cover.png',
        'category' => 'iPad'
    ],
    [
        'id' => 4, // Unique ID for iPad Pro 11 M4
        'name' => 'iPad Pro 11 M4',
        'author' => '256 Gb',
        'price' => 'от 90 000',
        'image' => '../images/cover.png',
        'category' => 'iPad'
    ],
    [
        'id' => 5, // Unique ID for Macbook Air M1
        'name' => 'Macbook Air M1',
        'author' => '256 Gb',
        'price' => 'от 69 000',
        'image' => '../images/cover.png',
        'category' => 'Компьютеры'
    ],
    [
        'id' => 6, // Unique ID for iMac 24' M4
        'name' => 'iMac 24\' M4',
        'author' => '256 Gb',
        'price' => 'от 159 000',
        'image' => '../images/cover.png',
        'category' => 'Компьютеры'
    ],
    [
        'id' => 7, // Unique ID for Apple Watch 9
        'name' => 'Apple Watch 9',
        'author' => '32 Gb',
        'price' => 'от 28 000',
        'image' => '../images/cover.png',
        'category' => 'Apple Watch'
    ],
    [
        'id' => 8, // Unique ID for Apple Watch Ultra
        'name' => 'Apple Watch Ultra',
        'author' => '64 Gb',
        'price' => 'от 65 000',
        'image' => '../images/cover.png',
        'category' => 'Apple Watch'
    ]
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Calculate cart item count BEFORE using it in the HTML
$cart_item_count = 0; // Initialize to 0
if (!empty($_SESSION['cart'])) {
    $cart_item_count = array_sum(array_column($_SESSION['cart'], 'quantity'));
}


if (isset($_POST['add_to_cart'])) {
    $product_id = (int)$_POST['product_id'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$product_id] = [
            'quantity' => 1
        ];
    }

    // After adding to cart, recalculate the count
    $cart_item_count = array_sum(array_column($_SESSION['cart'], 'quantity'));

    header('Location: cart.php'); // Consider redirecting back to catalog.php if you want to stay on the same page
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Каталог техники Apple</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="../styles/footer.css" />
    <link rel="stylesheet" href="../styles/header.css" />
    <link rel="stylesheet" href="../styles/components.css" />
    <link rel="stylesheet" href="../styles/page.css" />
    <style>
        .chip {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .chip_active {
            background-color: var(--color-primary); /* Пример активного цвета чипа */
            color: white;
        }
        .chip:not(.chip_active):hover {
            background-color: var(--color-primary-hover); /* Цвет при наведении */
        }
        .course-card.hidden {
            display: none;
        }
        .courses_wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Адаптивная сетка */
            gap: 20px; /* Отступы между карточками */
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header__wrapper">
            <a href="index.php"><img class="header__logo" src="../images/logo.svg" alt="Логотип Apple Dubai" /></a>
            <nav>
                <ul class="menu">
                    <li class="menu__item"><a href="../index.php">Главная</a></li>
                    <li class="menu__item menu__item_active"><a href="catalog.php">Apple</a></li>
                    <li class="menu__item"><a href="#">О нас</a></li>
                    <li class="menu__item"><a href="#">Блог</a></li>
                    <li class="menu__item"><a href="#">База знаний</a></li>
                </ul>
            </nav>
            <a class="header__login" href="auth/auth.php" aria-label="Избранное">
                <img src="../images/heart.svg" alt="Избранные товары"/>
            </a>
            <a class="header__login" href="./cart.php" aria-label="Корзина">
                <img src="../images/shopping-cart.svg" alt="Корзина товаров"/>
                <?php if ($cart_item_count > 0): ?>
                    <span class="cart-item-count"><?php echo $cart_item_count; ?></span>
                <?php endif; ?>
            </a>
            <a class="header__login" href="../auth/auth.php" aria-label="Вход в личный кабинет">
                <img src="../images/user.svg" alt="Иконка пользователя" />
                <div>Вход</div>
            </a>
            <button class="header__mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                <img src="../images/burger.svg" alt="Мобильное меню" />
            </button>
        </div>
    </header>

    <section class="section">
        <div class="section__wrapper">
            <div class="headling">
                <div class="headling__top">Выбрать технику</div>
                <h2 class="headling__buttom">Каталог товаров</h2>
            </div>
            <div class="chip_wrapper">
                <button class="chip chip_active" data-category="Все">Все</button>
                <button class="chip" data-category="iPhone">iPhone</button>
                <button class="chip" data-category="iPad">iPad</button>
                <button class="chip" data-category="Компьютеры">Компьютеры</button>
                <button class="chip" data-category="Apple Watch">Apple Watch</button>
            </div>
            <div class="courses_wrapper" id="products-container">
                <?php foreach ($products as $product): ?>
                    <div class="course-card" data-category="<?php echo htmlspecialchars($product['category']); ?>">
                        <div class="course-card__cover">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Изображение товара">
                        </div>
                        <div class="course-card__body">
                            <div>
                                <div class="course-card__title"><?php echo htmlspecialchars($product['name']); ?></div>
                                <div class="course-card__author"><?php echo htmlspecialchars($product['author']); ?></div>
                            </div>
                            <div class="course-card__tags">
                                <span class="tag">
                                    <img src="../images/star-icon.svg" alt="Иконка рейтинга">
                                    4.9
                                </span>
                                <span class="tag">Apple</span>
                            </div>
                        </div>
                        <div class="course-card__footer">
                            <div><?php echo htmlspecialchars($product['price']); ?></div>
                            <form action="catalog.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                <button type="submit" name="add_to_cart" class="button button_primary">Купить</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section_light">
        <div class="section__wrapper trust-wrapper">
            <div class="trust-wrapper__top">
                <div class="headling">
                    <div class="headling__top">О нас</div>
                    <h2 class="headling__buttom">Нам доверяют</h2>
                </div>
                <p class="paragraph paragraph_32">
                    В компании Apple Dubai мы страстно увлечены предоставлением высококачественной техники Apple по России и СНГ. <br />
                    Наша миссия — сделать инновационные продукты доступными для всех, кто ценит технологии и дизайн.
                </p>
            </div>
            <div class="card card_light card_48x24 trust-wrapper__stat">
                <div class="trust-wrapper__num">15 000</div>
                <div class="trust-wrapper__desc">заказов по всему миру</div>
            </div>
            <div class="card card_light card_48x24 trust-wrapper__stat">
                <div class="trust-wrapper__num">90 дней</div>
                <div class="trust-wrapper__desc">гарантия возврата денег</div>
            </div>
            <div class="card card_light card_48x24 trust-wrapper__stat">
                <div class="trust-wrapper__num">90%</div>
                <div class="trust-wrapper__desc">покупателей рекомендуют нас</div>
            </div>
            <h3 class="trust-wrapper__h3">
                Рейтинги на независимых платформах
            </h3>
            <div class="card card_light card_24x32 trust-wrapper__rating">
                <div class="trust-wrapper__rate">4.8</div>
                <div><img src="../images/logos/coursesTop.svg" alt="Логотип КурсесТоп"></div>
            </div>
            <div class="card card_light card_24x32 trust-wrapper__rating">
                <div class="trust-wrapper__rate">4.8</div>
                <div><img src="../images/logos/stepik.svg" alt="Логотип КурсесТоп"></div>
            </div>
            <div class="card card_light card_24x32 trust-wrapper__rating">
                <div class="trust-wrapper__rate">4.8</div>
                <div><img src="../images/logos/udemy.svg" alt="Логотип КурсесТоп"></div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="section__wrapper">
            <div class="headling">
                <div class="headling__top">Блог и социальные сети</div>
                <h2 class="headling__buttom">Полезные материалы</h2>
            </div>
            <p class="paragraph paragraph_32">
                Каждую неделю мы публикуем новости, обновления, а так же
                дополнительные полезные материалы в социальных сетях:
            </p>
            <div class="social-icons">
                <a href="#" class="social-icons__icon">
                    <img src="./images/social/youtube.svg" alt="Youtube PurpleSchool" />
                </a>
                <a href="#" class="social-icons__icon">
                    <img src="./images/social/telegram.svg" alt="Telegram PurpleSchool" />
                </a>
                <a href="#" class="social-icons__icon">
                    <img src="./images/social/vk.svg" alt="ВКонтакте PurpleSchool" />
                </a>
            </div>
            <div class="post-wrapper">
                <article class="post card card_32">
                    <div class="post__content">
                        <div class="post__stats">
                            <div class="post__stat">
                                <img src="./images/time/calendar-icon.svg" alt="Иконка календаря" />
                                06 мая 2024
                            </div>
                            <div class="post__stat">
                                <img src="./images/Security/view.svg" alt="Иконка календаря" />
                                2 584 просмотра
                            </div>
                        </div>
                        <h3 class="post__header">
                            Инновации в Apple
                        </h3>
                        <div class="post__description">
                            Инновации Apple, особенно в серии iPhone, революционизировали мир мобильных технологий. С момента появления первого
                            iPhone, мир стал ближе, проще и удобнее. iPhone полностью реконструировал мобильную индустрию, сделав смартфоны
                            неотъемлемой частью нашей жизни. Сегодня iPhone продолжает эволюционировать, включая в себя передовые технологии и
                            дизайн, которые делают его одним из самых популярных смартфонов в мире.
                        </div>
                    </div>
                    <div class="post__button">
                        <a href="#" class="button button_ghost">Читать</a>
                    </div>
                </article>
                <article class="post card card_32">
                    <div class="post__content">
                        <div class="post__stats">
                            <div class="post__stat">
                                <img src="./images/time/calendar-icon.svg" alt="Иконка календаря" />
                                06 мая 2024
                            </div>
                            <div class="post__stat">
                                <img src="./images/Security/view.svg" alt="Иконка календаря" />
                                2 584 просмотра
                            </div>
                        </div>
                        <h3 class="post__header">
                            Акссесуары для техники Apple
                        </h3>
                        <div class="post__description">
                            2. Аксессуары для техники Apple: Расширение возможностей
                            Аксессуары для техники Apple не только повышают удобство использования устройств, но и позволяют расширить их
                            функциональность. Для iPhone доступны стильные чехлы и держатели для наушников, для iPad — беспроводные клавиатуры и
                            обложки Smart Cover, а для Apple Watch — эффектные ремешки. Эти аксессуары помогают сделать ваши устройства уникальными
                            и еще более практичными.
                        </div>
                    </div>
                    <div class="post__button">
                        <a href="#" class="button button_ghost">Читать</a>
                    </div>
                </article>
                <article class="post card card_32">
                    <div class="post__content">
                        <div class="post__stats">
                            <div class="post__stat">
                                <img src="./images/time/calendar-icon.svg" alt="Иконка календаря" />
                                06 мая 2024
                            </div>
                            <div class="post__stat">
                                <img src="./images/Security/view.svg" alt="Иконка календаря" />
                                2 584 просмотра
                            </div>
                        </div>
                        <h3 class="post__header">
                            Macbook Air M1
                        </h3>
                        <div class="post__description">
                            Выпуск MacBook Air M1 стал значительным шагом в инновациях Apple. Этот ноутбук не только обеспечивает высокую
                            производительность, но и отличается энергоэффективностью и компактностью. MacBook Air M1 идеально подходит для тех, кто
                            ценит мобильность и мощность, что делает его популярным выбором среди пользователей, требующих высоких показателей
                            производительности.
                        </div>
                    </div>
                    <div class="post__button">
                        <a href="#" class="button button_ghost">Читать</a>
                    </div>
                </article>
            </div>

            <?php //Закрыть часть страницы для неавторизованного пользователя
                if (!empty($_SESSION['auth'])) {
                    echo 'Статьи только для авторизованного пользователя';
                }
            ?>

            <div class="button-more">
                <a href="#" class="button button_ghost">Все публикации</a>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__wrapper">
            <div class="footer__social">
                <a href="index.php"><img class="footer__logo" src="./images/logo.svg" alt="Логотип PurpleSchool" /></a>
                <div class="social-icons">
                    <a href="#" class="social-icons__icon">
                        <img src="./images/social/youtube.svg" alt="Youtube PurpleSchool" />
                    </a>
                    <a href="#" class="social-icons__icon">
                        <img src="./images/social/telegram.svg" alt="Telegram PurpleSchool" />
                    </a>
                    <a href="#" class="social-icons__icon">
                        <img src="./images/social/vk.svg" alt="ВКонтакте PurpleSchool" />
                    </a>
                </div>
            </div>
            <div class="footer__menu">
                <nav>
                    <div class="footer__menu-header">Меню</div>
                    <ul class="menu-small">
                        <li class="menu-small__item"><a href="catalog.php">Apple</a></li>
                        <li class="menu-small__item"><a href="#">О нас</a></li>
                        <li class="menu-small__item"><a href="#">Блог</a></li>
                        <li class="menu-small__item"><a href="#">База знаний</a></li>
                    </ul>
                </nav>
                <div>
                    <div class="footer__menu-header">Документы</div>
                    <ul class="menu-small">
                        <li class="menu-small__item"><a href="#">Договор Оферта</a></li>
                        <li class="menu-small__item">
                            <a href="#">Политика конфиденциальности</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="footer__menu-header">Реквизиты</div>
                    <ul class="menu-small">
                        <li class="menu-small__item">ИП Иванов Анатолий Алекснадрович</li>
                        <li class="menu-small__item">ИНН 773389764371</li>
                        <li class="menu-small__item">
                            <a href="mailto:contact@purpleschool.ru">contact@appledubai.ru</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__copywrite">
                Apple Dubai © 2024 - 2025 Все права защищены
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chipButtons = document.querySelectorAll('.chip_wrapper .chip');
            const productCards = document.querySelectorAll('#products-container .course-card');

            chipButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Удаляем класс активности у всех чипов
                    chipButtons.forEach(btn => btn.classList.remove('chip_active'));

                    // Добавляем класс активности к нажатому чипу
                    this.classList.add('chip_active');

                    const selectedCategory = this.dataset.category;

                    productCards.forEach(card => {
                        const productCategory = card.dataset.category;

                        if (selectedCategory === 'Все' || productCategory === selectedCategory) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>