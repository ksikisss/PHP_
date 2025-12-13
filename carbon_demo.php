<?php
namespace Demo\CarbonExample;
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans:ital,wght@0,1..1000;1,1..1000&display=swap" rel="stylesheet">
    <title><?php echo htmlspecialchars($pageTitle ?? 'Carbon Демонстрація', ENT_QUOTES, 'UTF-8'); ?></title>
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
            <h1 style="text-align: center; margin-bottom: 30px;"> Carbon Демонстрація</h1>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">1. Поточний час</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    require_once 'vendor/autoload.php';
                    use Carbon\Carbon;
                    $tomorrow = Carbon::tomorrow();
                    $now = Carbon::now();
                    echo "<p><strong>Зараз:</strong> {$now->toDateTimeString()}</p>";
                    echo "<p><strong>Дата:</strong> {$now->toDateString()}</p>";
                    echo "<p><strong>Час:</strong> {$now->toTimeString()}</p>";
                    echo "<p><strong>Завтра:</strong> {$tomorrow->toDateString()}</p>";
                    ?>
                </div>
            </div>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">2. Операції з датами</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    $date = Carbon::create(2025, 12, 12);
                    
                    echo "<p><strong>Базова дата:</strong> {$date->toDateString()}</p>";
                    echo "<p><strong>+1 тиждень:</strong> {$date->copy()->addWeek()->toDateString()}</p>";
                    echo "<p><strong>+1 місяць:</strong> {$date->copy()->addMonth()->toDateString()}</p>";
                    echo "<p><strong>-5 днів:</strong> {$date->copy()->subDays(5)->toDateString()}</p>";
                    ?>
                </div>
            </div>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">3. Форматування</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    $date = Carbon::create(2024, 3, 15, 14, 30, 45);

                    echo "<p><strong>Людський формат:</strong> {$date->format('l, F j, Y г. о H:i')}</p>";
                    echo "<p><strong>Короткий:</strong> {$date->format('d.m.Y H:i')}</p>";
                    ?>
                </div>
            </div>

            <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h2 style="color: #333; margin-bottom: 15px;">4. Часові пояси</h2>
                <div style="background-color: #fff; padding: 15px; border-radius: 4px; border: 1px solid #ddd;">
                    <?php
                    $utc = Carbon::now('UTC');
                    $kyiv = $utc->copy()->setTimezone('Europe/Kiev');
                    $london = $utc->copy()->setTimezone('Europe/London');

                    echo "<p><strong>UTC:</strong> {$utc->toDateTimeString()}</p>";
                    echo "<p><strong>Київ:</strong> {$kyiv->toDateTimeString()}</p>";
                    echo "<p><strong>Лондон:</strong> {$london->toDateTimeString()}</p>";
                    ?>
                </div>
            </div>

            <div style="background-color: #e8f5e8; padding: 20px; border-radius: 8px; border: 1px solid #4caf50;">
                <h2 style="color: #2e7d32; margin-bottom: 15px;">✅ Результат</h2>
                <p style="margin: 0;">Carbon дозволяє легко працювати з датами та часом в PHP!</p>
            </div>
        </div>
    </main>
</body>
</html>

// Запуск демонстрації
$demo = new CarbonDemo();
$demo->execute();
