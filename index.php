<?php
// Простий PHP-роутер для сайту Maybelline

// Поточний маршрут (?route=home, ?route=signin, ?route=signup і т.д.)
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Доступні сторінки сайту
$routes = [
    'home' => [
        'file'  => 'home.php',
        'title' => 'Maybelline New York – Офіційний сайт',
    ],
    'signin' => [
        'file'  => 'login.php',
        'title' => 'Вхід',
    ],
    'signup' => [
        'file'  => 'register.php',
        'title' => 'Реєстрація',
    ],
    'monolog_demo' => [
        'file'  => 'monolog_demo.php',
        'title' => 'Monolog Демонстрація',
    ],
    'carbon_demo' => [
        'file'  => 'carbon_demo.php',
        'title' => 'Carbon Демонстрація',
    ],
    'var_dumper_demo' => [
        'file'  => 'var_dumper_demo.php',
        'title' => 'VarDumper Демонстрація',
    ],
];

// Елементи навігації
$navItems = [
    'home'   => 'Головна',
    'signin' => 'Вхід',
    'signup' => 'Реєстрація',
    'monolog_demo' => 'Monolog Demo',
    'carbon_demo' => 'Carbon Demo',
    'var_dumper_demo' => 'VarDumper Demo',
];

// Визначаємо, яку сторінку завантажувати
if (isset($routes[$route]) && file_exists(__DIR__ . '/' . $routes[$route]['file'])) {
    $pageTitle    = $routes[$route]['title'];
    $currentRoute = $route;
    include __DIR__ . '/' . $routes[$route]['file'];
} else {
    // 404 — сторінка не знайдена
    http_response_code(404);
    $pageTitle    = '404 – Сторінка не знайдена';
    $currentRoute = null;
    include __DIR__ . '/404.php';
}


