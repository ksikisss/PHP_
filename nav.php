<?php

if (!isset($navItems) || !is_array($navItems)) {
    if (isset($_SESSION['user'])) {
        $navItems = [
            'home'     => 'Головна',
            'api-demo' => '🐱 Cats API',
            'logout'   => 'Вийти (' . htmlspecialchars($_SESSION['user']['name']) . ')',
        ];
    } else {
        $navItems = [
            'home'   => 'Головна',
            'signin' => 'Вхід',
            'signup' => 'Реєстрація',
            'api-demo' => 'Cats API',
        ];
    }
}

if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_destroy();
    header('Location: index.php?route=home');
    exit;
}
?>
<nav class="router-nav">
    <ul>
        <?php foreach ($navItems as $key => $label): ?>
            <li>
                <a href="<?php echo $key === 'logout' ? 'index.php?logout=true' : 'index.php?route=' . urlencode($key); ?>"
                   class="<?php echo isset($currentRoute) && $currentRoute === $key ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>


