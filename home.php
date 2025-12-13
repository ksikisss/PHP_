<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <meta name="description" content="Maybelline New York - косметика для макіяжу. Всі новинки, бестселери та поради щодо макіяжу.">
    <meta name="keywords" content="Maybelline, косметика, макіяж, новинки, бестселери, поради">
    <meta name="author" content="Maybelline Ukraine">
    <script src="scripts/script.js" defer></script>
    <script src="scripts/matcher.js" defer></script>
    <title><?php echo htmlspecialchars($pageTitle ?? 'Maybelline New York – Офіційний сайт', ENT_QUOTES, 'UTF-8'); ?></title>
</head>
<body>
    <header>
        <div class="header-top">
            <div class="search-container">
                <img src="assets/search.png" alt="Пошук" class="search-icon">
                <input type="text" class="search-input" placeholder="Введіть текст...">
            </div>

            <div class="logo-block">
                <h1 class="logo">MAYBELLINE</h1>
                <h2 class="logo">New York</h2>
            </div>
            
            <div class="account-link">
                <a href="index.php?route=signin">Акаунт</a>
            </div>
        </div>

        <nav class="menu">
            <div class="menu-item">
                <a>ВСІ ПРОДУКТИ</a>
            </div>
            
            <div class="menu-item">
                <a>ОЧІ</a>
                <div class="submenu">
                    <a>Брови</a>
                    <a>Підводка Для Очей</a>
                    <a>Тіні Для Повік</a>
                    <a>Туш Для Вій</a>
                    <a>View All</a>
                </div>
            </div>
            
            <div class="menu-item">
                <a>ОБЛИЧЧЯ</a>
                <div class="submenu">
                    <a>BB-Крем</a>
                    <a>Рум'яна Та Бронзер</a>
                    <a>Консилер Для Обличчя</a>
                    <a>Тональна Основа</a>
                    <a>Пудра</a>
                    <a>Праймер І Спрей-Фіксатор</a>
                    <a>View All</a>
                </div>
            </div>

            <div class="menu-item">
                <a>ГУБИ</a>
                <div class="submenu">
                    <a>Помада Для Губ</a>
                    <a>Блиск Для Губ</a>
                    <a>Бальзам Для Губ</a>
                    <a>Олівець Для Губ</a>
                    <a>View All</a>
                </div>
            </div>

            <div class="menu-item">
                <a>ПОРАДИ ЩОДО МАКІЯЖУ</a>
                <div class="submenu">
                    <a>Очі</a>
                    <a>Обличчя</a>
                    <a>Уроки Макіяжу Губ</a>
                    <a>Тренди Макіяжу</a>
                    <a>View All</a>
                </div>
            </div>
            <div class="menu-item">
                <a>ПРО НАС</a>
                <div class="submenu">
                    <a>Про Нас</a>
                    <a>Brave Together</a>
                    <a>Conscious Together</a>
                    <a>View All</a>
                </div>
            </div>

            <div class="menu-item">
                <a>BRAVE TOGETHER</a>
                <div class="submenu">
                    <!-- пока пусто -->
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="video-banner">      
            <video id="video-player" muted autoplay playsinline></video>
        </div>>

        <section class="product-list" aria-label="Нові засоби">
            <div class="new-products">
                <div class="new-products-header">
                    <h2>НОВІ<br>ЗАСОБИ</h2>
                    <a class="view-all">УСІ ПРОДУКТИ →</a>
                </div>
            </div>
            <div class="product-box">
                <article class="product-card">
                    <a>
                        <figure>
                            <img src="assets/products/mascara.jpg" alt="Туш для феєричного подовження">
                            <figcaption class="product-overlay">ТУШ ДЛЯ ФЕЄРИЧНОГО ПОДОВЖЕННЯ</figcaption>
                        </figure>
                    </a>
                </article>

                <article class="product-card">
                    <a>
                        <figure>
                            <img src="assets/products/liner.jpg" alt="Стійкий автоматичний лайнер">
                            <figcaption class="product-overlay">СТІЙКИЙ АВТОМАТИЧНИЙ ЛАЙНЕР</figcaption>
                        </figure>
                    </a>
                </article>

                <article class="product-card">
                    <a>
                        <figure>
                            <img src="assets/products/blush.jpg" alt="Рідкі рум'яна-хайлайтер">
                            <figcaption class="product-overlay">РІДКІ РУМ'ЯНА-ХАЙЛАЙТЕР</figcaption>
                        </figure>
                    </a>
                </article>

                <article class="product-card">
                    <a>
                        <figure>
                            <img src="assets/products/brow-gel.jpg" alt="Фіксуючий гель-стайлер для брів">
                            <figcaption class="product-overlay">ФІКСУЮЧИЙ ГЕЛЬ ДЛЯ БРІВ</figcaption>
                        </figure>
                    </a>
                </article>
            </div>
        </section>

        <section class="recomendation-list" aria-label="Макіяж та образи">
            <div class="new-products">
                <div class="new-products-header">
                    <h2>МАКІЯЖ<br>ВИДИ Й ПОРАДИИ</h2>
                    <p>Дізнайся про трендовий макіяж або опануй ці хитрощі вже сьогодні!</p>
                    <a class="view-all">Усі образи →</a>
                </div>
            </div>

            <article class="product-card">
                <a>
                    <figure>
                        <img src="assets/recomendation/make-eye.jpg" alt="12 образів із підводкою">
                        <figcaption class="recomendation-overlay">12 ОБРАЗІВ ІЗ ПІДВОДКОЮ</figcaption>
                    </figure>
                </a>
            </article>

            <article class="product-card">
                <a>
                    <figure>
                        <img src="assets/recomendation/make-lips.jpg" alt="Як зробити червоний макіяж губ з ефектом омбре">
                        <figcaption class="recomendation-overlay">ЯК ЗРОБИТИ ЧЕРВОНИЙ МАКІЯЖ ГУБ З ЕФЕКТОМ ОМБРЕ?</figcaption>
                    </figure>
                </a>
            </article>

            <article class="product-card">
                <a>
                    <figure>
                        <img src="assets/recomendation/make-lips2.jpg" alt="Як наносити рідку матову помаду? Уроки макіяжу губ">
                        <figcaption class="recomendation-overlay">ЯК НАНОСИТИ РІДКУ МАТОВУ ПОМАДУ? УРОКИ МАКІЯЖУ ГУБ.</figcaption>
                    </figure>
                </a>
            </article>

            <article class="product-card">
                <a>
                    <figure>
                        <img src="assets/recomendation/make-eye2.jpg" alt="Як намалювати відкриті стрілки">
                        <figcaption class="recomendation-overlay">ЯК НАМАЛЮВАТИ ВІДКРИТІ СТРІЛКИ</figcaption>
                    </figure>
                </a>
            </article>
        </section>
        
        <section class="products-bet" aria-label="Бестселери">
            <div class="bestseleru">
                <div class="bestseleru-header">
                    <h2>БЕСТСЕЛЕРИ</h2>
                    <a class="view-all">дивитися все →</a>
                </div>
            </div>
            
            <article class="products-bet-card">
                <figure>
                    <img src="assets/bestseleru/Instant-Eraser.jpg" alt="Instant Eraser">
                    <figcaption class="products-bet-overlay">Instant Eraser</figcaption>
                </figure>
                <button type="button">КУПИТИ ЗАРАЗ</button>
            </article>

            <article class="products-bet-card">
                <figure>
                    <img src="assets/bestseleru/Express-Brow.jpg" alt="Express Brow Ultra Slim">
                    <figcaption class="products-bet-overlay">Express Brow Ultra Slim</figcaption>
                </figure>
                <button type="button">КУПИТИ ЗАРАЗ</button>
            </article>

            <article class="products-bet-card">
                <figure>
                    <img src="assets/bestseleru/Sky-High.jpg" alt="Lash Sensational Sky High">
                    <figcaption class="products-bet-overlay">Lash Sensational Sky High</figcaption>
                </figure>
                <button type="button">КУПИТИ ЗАРАЗ</button>
            </article>

            <article class="products-bet-card">
                <figure>
                    <img src="assets/bestseleru/Super-Stay.jpg" alt="Super Stay Mate Ink">
                    <figcaption class="products-bet-overlay">Super Stay Mate Ink</figcaption>
                </figure>
                <button type="button">КУПИТИ ЗАРАЗ</button>
            </article>

            <article class="products-bet-card">
                <figure>
                    <img src="assets/bestseleru/Fit-Me.jpg" alt="Fit Me Concealer">
                    <figcaption class="products-bet-overlay">Fit Me Concealer</figcaption>
                </figure>
                <button type="button">КУПИТИ ЗАРАЗ</button>
            </article>
        </section>

        <section class="demos-section" aria-label="PHP Демонстрації">
            <div class="new-products">
                <div class="new-products-header">
                    <h2>PHP<br>ДЕМОНСТРАЦІЇ</h2>
                    <p>Перегляньте приклади роботи з різними PHP бібліотеками</p>
                </div>
            </div>

            <div class="demo-links">
                <a href="index.php?route=monolog_demo" class="demo-card">
                    <div class="demo-content">
                        <h3>📝 Monolog Demo</h3>
                        <p>Демонстрація логування з використанням бібліотеки Monolog</p>
                    </div>
                </a>

                <a href="index.php?route=carbon_demo" class="demo-card">
                    <div class="demo-content">
                        <h3>📅 Carbon Demo</h3>
                        <p>Робота з датами та часом за допомогою бібліотеки Carbon</p>
                    </div>
                </a>

                <a href="index.php?route=var_dumper_demo" class="demo-card">
                    <div class="demo-content">
                        <h3>🔍 VarDumper Demo</h3>
                        <p>Красивий вивід даних з використанням Symfony VarDumper</p>
                    </div>
                </a>
            </div>
        </section>

        <section class="Set" aria-label="Порівняння фраз">
            <h2>Порівняння фраз</h2>
            <input
                id="textInput1"
                type="text"
                placeholder="Введіть першу фразу..."
            />
            <input
                id="textInput2"
                type="text"
                placeholder="Введіть другу фразу..."
            />
            <button id="checkBtn">Перевірити</button>
            <p id="result"></p>
        </section>
    </main>
    <footer class="site-footer">
        <div class="footer-top">
            <a href="https://www.maybelline.ua/faq">Поширені запитання</a>
            <a href="https://www.maybelline.ua/storinka-poshuku">Пошук</a>
            <a href="https://www.maybelline.ua/storinka-karty-saitu">Карта сайту</a>
        </div>

        <div class="footer-links">
            <a href="https://www.loreal.com/en/ukraine/pages/group/privacy-policy-ukraine/">Політика Конфіденційності</a>
            <a href="https://www.maybelline.ua/umovy-vikoristannya">Умови Використання</a>
            <a>Налаштування Файлів Cookie</a>
         </div>

        <div class="footer-social">
            <a href="https://www.facebook.com/MaybellineNYUkraine"><img src="assets/element/facebook.jpg" alt="Facebook"></a>
            <a href="https://www.instagram.com/maybelline/?locale=ruhl=bg"><img src="assets/element/Instagram.jpg" alt="Instagram"></a>
            <a href="https://www.youtube.com/channel/UCBrSRYMUnHsLpAECE2NfgXQ"><img src="assets/element/youtube.jpg" alt="YouTube"></a>
        </div>

        <div class="footer-bottom">
            <p>
            © 2024 Maybelline New York Цей сайт призначений для споживачів в Україні. Використовуються файли cookie та пов’язані технології для реклами. Щоб дізнатися більше або відмовитися, подивись AdChoices і нашу Політику конфіденційності.
            </p>
        </div>
    </footer>
</body>
</html>


