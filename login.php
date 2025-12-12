<?php

if (!isset($pageTitle)) {
    $pageTitle = 'Вхід';
}
if (!isset($currentRoute)) {
    $currentRoute = 'signin';
}
?>
<!DOCTYPE html> 
<html lang="uk"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title><?php echo htmlspecialchars($pageTitle ?? 'Вхід', ENT_QUOTES, 'UTF-8'); ?></title> 
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="styles/loginstyle.css">
</head> 
<body class="login-page"> 
<?php include __DIR__ . '/nav.php'; ?>
  <div class="login-container"> 
    <h1 class="login">Вхід</h1> 
    <form id="login-form"> 
      <label for="login"> 
        Логін 
        <input type="text" id="login" name="login" placeholder="user123" required> 
      </label> 
      <label for="email"> 
        Електронна пошта 
        <input type="email" id="email" name="email" placeholder="user@example.com" required> 
      </label> 
      <label for="phone"> 
        Телефон 
        <input type="tel" id="phone" name="phone" placeholder="+380XXXXXXXXX" required> 
      </label> 
      <label for="password"> 
        Пароль 
        <input type="password" id="password" name="password" placeholder="gh6092135hk" required> 
      </label> 
      <button type="submit" class="contrast">Увійти</button> 
    </form> 
    <p style="text-align: center; margin-top: 1rem;"> 
      <a>Забули пароль?</a> | <a>Реєстрація</a> 
    </p> 
  </div> 
</body> 
</html>


