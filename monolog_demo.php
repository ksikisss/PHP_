<?php
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <title><?php echo htmlspecialchars($pageTitle ?? 'Monolog Демонстрація', ENT_QUOTES, 'UTF-8'); ?></title>
</head>
<body>
    <!-- Навігація роутера -->
    <nav class="router-nav">
        <ul>
            <?php
            global $navItems, $currentRoute;
            foreach ($navItems as $route => $label) {
                $activeClass = ($currentRoute === $route) ? 'active' : '';
                echo "<li><a href='index.php?route=$route' class='$activeClass'>$label</a></li>";
            }
            ?>
        </ul>
    </nav>

    <main style="padding: 20px; font-family: Arial, sans-serif;">
        <div style="max-width: 800px; margin: 0 auto;">
            <h1 style="text-align: center; margin-bottom: 30px;">📝 Monolog Демонстрація</h1>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <pre style="background-color: #2d3748; color: #e2e8f0; padding: 15px; border-radius: 4px; overflow-x: auto; font-family: 'Courier New', monospace;"><?php

require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Processor\MemoryUsageProcessor;

// Створюємо основний логер
$logger = new Logger('website_app');

// Додаємо обробник для запису до файлу з ротацією
$logger->pushHandler(new RotatingFileHandler('logs/website_demo.log', 7, Logger::DEBUG));

// Додаємо процесор для відстеження використання пам'яті
$logger->pushProcessor(new MemoryUsageProcessor());

// Різні рівні логування для веб-сайту
$logger->debug('Ініціалізація системи розпочата');
$logger->info('Веб-сайт успішно завантажено');
$logger->notice('Користувач переглядає головну сторінку');
$logger->warning('Повільне завантаження сторінки');
$logger->error('Помилка підключення до бази даних');
$logger->critical('Сервер недоступний');
$logger->alert('Критична вразливість виявлена');
$logger->emergency('Система вийшла з ладу');

// Логування з контекстом для користувача
$userData = ['id' => 456, 'email' => 'user@example.com', 'role' => 'admin'];
$logger->info('Адміністратор увійшов до системи', ['user' => $userData]);

// Логування системних подій
$systemInfo = ['php_version' => phpversion(), 'server' => $_SERVER['SERVER_NAME'] ?? 'localhost'];
$logger->info('Системна інформація', ['system' => $systemInfo]);

echo "✅ Демонстрація Monolog завершена успішно!\n";
echo "📁 Перевірте файл logs/website_demo.log для перегляду логів.";

?></pre>
            </div>

            <div style="text-align: center;">
                <a href="index.php?route=home" style="display: inline-block; background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 20px;">← Повернутися на головну</a>
            </div>
        </div>
    </main>
</body>
</html>
