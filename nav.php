<?php

if (!isset($navItems) || !is_array($navItems)) {
    $navItems = [
        'home'  => 'Головна',
        'login' => 'Логін / Реєстрація',
    ];
}
?>
<nav class="router-nav">
    <ul>
        <?php foreach ($navItems as $key => $label): ?>
            <li>
                <a href="index.php?route=<?php echo urlencode($key); ?>"
                   class="<?php echo isset($currentRoute) && $currentRoute === $key ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>


