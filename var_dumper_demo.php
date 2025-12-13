<?php
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <title><?php echo htmlspecialchars($pageTitle ?? 'VarDumper Демонстрація', ENT_QUOTES, 'UTF-8'); ?></title>
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
        <div style="max-width: 1000px; margin: 0 auto;">
            <h1 style="text-align: center; margin-bottom: 30px;">🔍 VarDumper Демонстрація</h1>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">1. Базове використання dump()</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    require_once 'vendor/autoload.php';
                    use Symfony\Component\VarDumper\VarDumper;

                    $data = [
                        'name' => 'John Doe',
                        'age' => 30,
                        'email' => 'john@example.com',
                        'hobbies' => ['reading', 'coding', 'gaming']
                    ];
                    dump($data);
                    ?>
                </div>
            </div>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">2. Dump масиву з різними типами даних</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    $mixedArray = [
                        'string' => 'Hello World',
                        'integer' => 42,
                        'float' => 3.14159,
                        'boolean' => true,
                        'null' => null,
                        'array' => [1, 2, 3],
                        'object' => (object)['property' => 'value']
                    ];
                    dump($mixedArray);
                    ?>
                </div>
            </div>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">3. Dump об'єкта</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    $user = new stdClass();
                    $user->name = 'Jane Smith';
                    $user->role = 'admin';
                    $user->permissions = ['read', 'write', 'delete'];
                    dump($user);
                    ?>
                </div>
            </div>

            <div style="background-color: #ffe6e6; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ff9999;">
                <h2 style="color: #d63031; margin-bottom: 15px;">⚠️ Увага: Наступний приклад використовує dd() (dump and die)</h2>
                <p style="color: #d63031; margin-bottom: 15px;">Функція dd() виводить дані та завершує виконання скрипта. Це демонстрація - наступні приклади не будуть виконані.</p>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    // Це буде закоментовано, щоб уникнути припинення виконання
                    // $numbers = [1, 2, 3, 4, 5];
                    // dd($numbers);
                    echo "<em>Приклад закоментовано для демонстрації</em>";
                    ?>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="index.php?route=home" style="display: inline-block; background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 20px;">← Повернутися на головну</a>
            </div>
        </div>
    </main>
</body>
</html>
