<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Техника Apple</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet" />
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
                    <li class="menu__item menu__item_active"><a href="#">Apple</a></li>
                    <li class="menu__item"><a href="#">О нас</a></li>
                    <li class="menu__item"><a href="#">Блог</a></li>
                    <li class="menu__item"><a href="#">База знаний</a></li>
                </ul>
            </nav>
            <a class="header__login" href="#" aria-label="Вход в личный кабинет">
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
                    <buтtton class="button button_primary">Выбрать товар</buтtton>
                    <button class="button button_ghost">О нас</button>
                </div>
            </div>
            <img class="hero__right" src="./images/video.png" alt="Видео с автором" />
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
                        <img src="./images/cover.png" alt="Изображение курса">
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
                        <div>от 28 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-card__cover">
                        <img src="./images/cover.png" alt="Изображение курса">
                    </div>
                    <div class="course-card__body">
                        <div>
                            <div class="course-card__title">Apple Watch Ultra</div>
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
                        <div>от 65 000</div>
                        <button class="button button_primary">Купить</button>
                    </div>
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
                <div><img src="./images/logos/coursesTop.svg" alt="Логотип КурсесТоп"></div>
            </div>
            <div class="card card_light card_24x32 trust-wrapper__rating">
                <div class="trust-wrapper__rate">4.8</div>
                <div><img src="./images/logos/stepik.svg" alt="Логотип КурсесТоп"></div>
            </div>
            <div class="card card_light card_24x32 trust-wrapper__rating">
                <div class="trust-wrapper__rate">4.8</div>
                <div><img src="./images/logos/udemy.svg" alt="Логотип КурсесТоп"></div>
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
            <div class="button-more">
                <a href="#" class="button button_ghost">Все публикации</a>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__wrapper">
            <div class="footer__social">
                <a href="#"><img class="footer__logo" src="./images/logo.svg" alt="Логотип PurpleSchool" /></a>
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
                        <li class="menu-small__item"><a href="#">Apple</a></li>
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