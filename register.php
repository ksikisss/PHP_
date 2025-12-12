<?php

if (!isset($pageTitle)) {
    $pageTitle = 'Реєстрація';
}
if (!isset($currentRoute)) {
    $currentRoute = 'signup';
}
?>
<!DOCTYPE html> 
<html lang="uk"> 
<head> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title><?php echo htmlspecialchars($pageTitle ?? 'Реєстрація', ENT_QUOTES, 'UTF-8'); ?></title> 
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="styles/loginstyle.css">
</head> 
<body class="login-page"> 
<?php include __DIR__ . '/nav.php'; ?>
  <div class="login-container"> 
    <h1 class="login">Реєстрація</h1> 
    <form id="register-form"> 
      <label for="name"> 
        Ім'я 
        <input type="text" id="name" name="name" placeholder="Ім'я" required> 
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
        <input type="password" id="password" name="password" placeholder="Пароль" required> 
      </label> 
      <label for="password_confirm"> 
        Підтвердження пароля 
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Повторіть пароль" required> 
      </label> 
      <button type="submit" class="contrast">Зареєструватися</button> 
    </form> 
  </div> 
</body> 
</html>


