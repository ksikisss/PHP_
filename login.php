<?php
session_start();

if (!isset($pageTitle)) {
    $pageTitle = 'Вхід';
}
if (!isset($currentRoute)) {
    $currentRoute = 'signin';
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($login) || empty($password)) {
        $error = 'Заповніть всі поля';
    } else {
        $usersFile = __DIR__ . '/users.json';
        $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
        $users = is_array($users) ? $users : [];

        $found = false;
        foreach ($users as $user) {
            if (($user['login'] === $login || $user['email'] === $login) && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'login' => $user['login']
                ];
                $success = 'Вхід успішний!';
                $found = true;
                header('Location: index.php?route=home');
                exit;
            }
        }
        if (!$found) {
            $error = 'Невірний логін або пароль';
        }
    }
}

if (isset($_SESSION['user'])) {
    header('Location: index.php?route=home');
    exit;
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
    <?php if ($error): ?>
        <div style="color: red; text-align: center; margin-bottom: 1rem;"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div style="color: green; text-align: center; margin-bottom: 1rem;"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <form method="POST" action="">
      <label for="login">
        Логін або Email
        <input type="text" id="login" name="login" placeholder="user123 або email" required>
      </label>
      <label for="password">
        Пароль
        <input type="password" id="password" name="password" placeholder="Пароль" required>
      </label>
      <button type="submit" class="contrast">Увійти</button>
    </form>
    <p style="text-align: center; margin-top: 1rem;">
      <a href="#">Забули пароль?</a> | <a href="index.php?route=signup">Реєстрація</a>
    </p>
  </div>
</body>
</html>


