<?php
session_start();

if (!isset($pageTitle)) {
    $pageTitle = 'Реєстрація';
}
if (!isset($currentRoute)) {
    $currentRoute = 'signup';
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $login = trim($_POST['login'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (empty($name) || empty($login) || empty($email) || empty($phone) || empty($password)) {
        $error = 'Заповніть всі поля';
    } elseif ($password !== $password_confirm) {
        $error = 'Паролі не співпадають';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль має бути не менше 6 символів';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Невірний email';
    } else {
        $usersFile = __DIR__ . '/users.json';
        $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];
        $users = is_array($users) ? $users : [];

        // Check if login or email already exists
        $exists = false;
        foreach ($users as $user) {
            if ($user['login'] === $login || $user['email'] === $email) {
                $exists = true;
                break;
            }
        }

        if ($exists) {
            $error = 'Користувач з таким логіном або email вже існує';
        } else {
            $newUser = [
                'id' => uniqid(),
                'name' => $name,
                'login' => $login,
                'email' => $email,
                'phone' => $phone,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $users[] = $newUser;
            $result = file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Проверяем, является ли это AJAX запросом
            $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

            if ($result === false) {
                $error = 'Помилка запису в файл';
                if ($isAjax) {
                    header('Content-Type: application/json');
                    echo json_encode(['success' => false, 'message' => $error]);
                    exit;
                }
            } else {
                $success = 'Реєстрація успішна! Тепер увійдіть.';
                if ($isAjax) {
                    header('Content-Type: application/json');
                    echo json_encode([
                        'success' => true,
                        'message' => 'Реєстрація успішна! Тепер ви можете увійти в систему.',
                        'user' => [
                            'name' => $name,
                            'email' => $email
                        ]
                    ]);
                    exit;
                }
            }
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
  <title><?php echo htmlspecialchars($pageTitle ?? 'Реєстрація', ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="styles/loginstyle.css">
</head>
<body class="login-page">
<?php include __DIR__ . '/nav.php'; ?>
  <div class="login-container">
    <h1 class="login">Реєстрація</h1>
    <?php if ($error): ?>
        <div style="color: red; text-align: center; margin-bottom: 1rem;"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div style="color: green; text-align: center; margin-bottom: 1rem;"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <form method="POST" action="">
      <label for="name">
        Ім'я
        <input type="text" id="name" name="name" placeholder="Ім'я" required>
      </label>
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
        <input type="password" id="password" name="password" placeholder="Пароль" required>
      </label>
      <label for="password_confirm">
        Підтвердження пароля
        <input type="password" id="password_confirm" name="password_confirm" placeholder="Повторіть пароль" required>
      </label>
      <button type="submit" class="contrast">Зареєструватися</button>
    </form>
    <p style="text-align: center; margin-top: 1rem;">
      Вже маєте аккаунт? <a href="index.php?route=signin">Увійти</a>
    </p>
  </div>
</body>
</html>


