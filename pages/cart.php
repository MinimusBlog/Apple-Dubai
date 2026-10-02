<?php
session_start();

// Это имитация данных о продуктах из catalog.php или базы данных.
// В реальном приложении эти данные должны быть загружены из одного источника (например, БД).
$products_data = [
    [
        'id' => 1,
        'name' => 'iPhone 15 Pro',
        'author' => '1Tb',
        'price' => '110000', // Используйте числовые значения для расчетов
        'image' => '../images/cover.png',
        'category' => 'iPhone'
    ],
    [
        'id' => 2,
        'name' => 'iPhone SE (2022)',
        'author' => '64Gb',
        'price' => '45000',
        'image' => '../images/cover.png',
        'category' => 'iPhone'
    ],
    [
        'id' => 3,
        'name' => 'iPad Air 13',
        'author' => '64 Gb',
        'price' => '52000',
        'image' => '../images/cover.png',
        'category' => 'iPad'
    ],
    [
        'id' => 4,
        'name' => 'iPad Pro 11 M4',
        'author' => '256 Gb',
        'price' => '90000',
        'image' => '../images/cover.png',
        'category' => 'iPad'
    ],
    [
        'id' => 5,
        'name' => 'Macbook Air M1',
        'author' => '256 Gb',
        'price' => '69000',
        'image' => '../images/cover.png',
        'category' => 'Компьютеры'
    ],
    [
        'id' => 6,
        'name' => 'iMac 24\' M4',
        'author' => '256 Gb',
        'price' => '159000',
        'image' => '../images/cover.png',
        'category' => 'Компьютеры'
    ],
    [
        'id' => 7,
        'name' => 'Apple Watch 9',
        'author' => '32 Gb',
        'price' => '28000',
        'image' => '../images/cover.png',
        'category' => 'Apple Watch'
    ],
    [
        'id' => 8,
        'name' => 'Apple Watch Ultra',
        'author' => '64 Gb',
        'price' => '65000',
        'image' => '../images/cover.png',
        'category' => 'Apple Watch'
    ]
];

// Преобразуем цены в числовой формат для расчетов (если они изначально строковые с "от " и пробелами)
// В реальном приложении цены должны быть числовыми в БД
foreach ($products_data as &$prod) {
    // Удаляем "от " и пробелы, затем приводим к float (или int, если цены всегда целые)
    $prod['price'] = (float)str_replace(['от ', ' '], '', $prod['price']);
}
unset($prod); // Важно снять ссылку после цикла foreach по ссылке

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle removing items from cart
if (isset($_POST['remove_from_cart'])) {
    $product_id_to_remove = (int)$_POST['product_id_to_remove'];
    if (isset($_SESSION['cart'][$product_id_to_remove])) {
        unset($_SESSION['cart'][$product_id_to_remove]);
    }
    header('Location: cart.php'); // Redirect to prevent form resubmission
    exit();
}

// Handle updating quantity
if (isset($_POST['update_quantity'])) {
    $product_id_to_update = (int)$_POST['product_id_to_update'];
    $new_quantity = (int)$_POST['quantity'];

    if (isset($_SESSION['cart'][$product_id_to_update])) {
        if ($new_quantity > 0) {
            $_SESSION['cart'][$product_id_to_update]['quantity'] = $new_quantity;
        } else {
            unset($_SESSION['cart'][$product_id_to_update]); // Remove if quantity is 0 or less
        }
    }
    header('Location: cart.php'); // Redirect to prevent form resubmission
    exit();
}

// Ensure all cart items have full product data
// This loop is crucial: it fetches the full product data from $products_data
// and merges it with the quantity stored in the session.
$cart_items_full_data = [];
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $itemData) {
        $found_in_products_data = false;
        foreach ($products_data as $product) {
            if ($product['id'] == $productId) {
                // Merge full product data with quantity from session
                $cart_items_full_data[$productId] = array_merge($product, ['quantity' => $itemData['quantity']]);
                $found_in_products_data = true;
                break;
            }
        }
        // If product not found in $products_data (e.g., removed from catalog), remove from cart
        if (!$found_in_products_data) {
            unset($_SESSION['cart'][$productId]);
        }
    }
}
$cart_items = $cart_items_full_data; // Используем полную информацию о товарах

// Calculate total price
$total_price = 0;
foreach ($cart_items as $item) {
    // Цена уже в числовом формате благодаря обработке $products_data
    $total_price += $item['price'] * $item['quantity'];
}

// Get total items in cart for display in header
$cart_item_count = 0;
foreach ($_SESSION['cart'] as $item) {
    $cart_item_count += $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ваша Корзина</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../styles/global.css" />
    <link rel="stylesheet" href="../styles/footer.css" />
    <link rel="stylesheet" href="../styles/header.css" />
    <link rel="stylesheet" href="../styles/components.css" />
    <link rel="stylesheet" href="../styles/page.css" />
    <style>
        /* Ваши стили */
        .cart-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            background-color: #fff;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }
        .cart-item__details {
            flex-grow: 1;
        }
        .cart-item__name {
            font-weight: bold;
            font-size: 1.2em;
        }
        .cart-item__price {
            color: #555;
        }
        .cart-item__quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .cart-item__quantity-controls input {
            width: 50px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .cart-item__remove-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .cart-item__remove-button:hover {
            background-color: #c82333;
        }
        .cart-summary {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: right;
        }
        .cart-summary__total {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .empty-cart-message {
            text-align: center;
            padding: 50px;
            font-size: 1.2em;
            color: #777;
        }
        /* Новый стиль для кружка с количеством */
        .cart-item-count {
            background-color: var(--color-primary); /* Пример активного цвета */
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.75em;
            position: relative;
            top: -8px;
            left: -5px;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header__wrapper">
            <a href="../index.php"><img class="header__logo" src="../images/logo.svg" alt="Логотип Apple Dubai" /></a>
            <nav>
                <ul class="menu">
                    <li class="menu__item"><a href="../index.php">Главная</a></li>
                    <li class="menu__item"><a href="catalog.php">Apple</a></li>
                    <li class="menu__item"><a href="#">О нас</a></li>
                    <li class="menu__item"><a href="#">Блог</a></li>
                    <li class="menu__item"><a href="#">База знаний</a></li>
                </ul>
            </nav>
            <a class="header__login" href="../auth/auth.php" aria-label="Избранное">
                <img src="../images/heart.svg" alt="Избранные товары"/>
            </a>
            <a class="header__login" href="cart.php" aria-label="Корзина">
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
                <div class="headling__top">Ваши покупки</div>
                <h2 class="headling__buttom">Ваша Корзина</h2>
            </div>

            <?php if (empty($cart_items)): ?>
                <p class="empty-cart-message">Ваша корзина пуста. <a href="catalog.php">Начните покупки!</a></p>
            <?php else: ?>
                <div class="cart-items-container">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="cart-item">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            <div class="cart-item__details">
                                <div class="cart-item__name"><?php echo htmlspecialchars($item['name']); ?></div>
                                <div class="cart-item__author"><?php echo htmlspecialchars($item['author']); ?></div>
                                <div class="cart-item__price">Цена: <?php echo number_format($item['price'], 0, '.', ' '); ?> ₽</div>
                            </div>
                            <div class="cart-item__quantity-controls">
                                <form method="post" action="cart.php" style="display: flex; align-items: center; gap: 5px;">
                                    <input type="hidden" name="product_id_to_update" value="<?php echo htmlspecialchars($item['id']); ?>">
                                    <button type="button" onclick="this.parentNode.querySelector('input[name=\'quantity\']').stepDown()">-</button>
                                    <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1">
                                    <button type="button" onclick="this.parentNode.querySelector('input[name=\'quantity\']').stepUp()">+</button>
                                    <button type="submit" name="update_quantity" class="button button_secondary">Обновить</button>
                                </form>
                            </div>
                            <form method="post" action="cart.php">
                                <input type="hidden" name="product_id_to_remove" value="<?php echo htmlspecialchars($item['id']); ?>">
                                <button type="submit" name="remove_from_cart" class="cart-item__remove-button">Удалить</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="cart-summary">
                    <div class="cart-summary__total">Итого: <?php echo number_format($total_price, 0, '.', ' '); ?> ₽</div>
                    <button class="button button_primary">Оформить заказ</button>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <footer class="footer">
        <div class="footer__wrapper">
            <div class="footer__social">
                <a href="../index.php"><img class="footer__logo" src="../images/logo.svg" alt="Логотип PurpleSchool" /></a>
                <div class="social-icons">
                    <a href="#" class="social-icons__icon">
                        <img src="../images/social/youtube.svg" alt="Youtube PurpleSchool" />
                    </a>
                    <a href="#" class="social-icons__icon">
                        <img src="../images/social/telegram.svg" alt="Telegram PurpleSchool" />
                    </a>
                    <a href="#" class="social-icons__icon">
                        <img src="../images/social/vk.svg" alt="ВКонтакте PurpleSchool" />
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
</body>
</html>