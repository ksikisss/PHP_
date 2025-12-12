<?php

require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;

// Демонстрація роботи Monolog

echo "=== Monolog Demo ===\n\n";

// 1. Створення базового логера
echo "1. Створення базового логера:\n";
$log = new Logger('demo');
$log->pushHandler(new StreamHandler('logs/demo.log', Logger::DEBUG));

$log->info('Це інформаційне повідомлення');
$log->warning('Це попередження');
$log->error('Це помилка');

echo "Логи записані в logs/demo.log\n\n";

// 2. Ротація лог-файлів
echo "2. Ротація лог-файлів:\n";
$rotatingLog = new Logger('rotating');
$rotatingLog->pushHandler(new RotatingFileHandler('logs/rotating.log', 5, Logger::DEBUG));

for ($i = 0; $i < 10; $i++) {
    $rotatingLog->info("Повідомлення номер " . ($i + 1));
}

echo "Ротаційні логи записані в logs/rotating.log.*\n\n";

// 3. Процесори для додавання додаткової інформації
echo "3. Процесори для додавання додаткової інформації:\n";
$processorLog = new Logger('processor');
$processorLog->pushHandler(new StreamHandler('logs/processor.log', Logger::DEBUG));
$processorLog->pushProcessor(new MemoryUsageProcessor());
$processorLog->pushProcessor(new WebProcessor());

$processorLog->info('Лог з інформацією про використання пам\'яті та веб-запит');

echo "Лог з процесорами записаний в logs/processor.log\n\n";

// 4. Різні рівні логування
echo "4. Різні рівні логування:\n";
$levelsLog = new Logger('levels');
$levelsLog->pushHandler(new StreamHandler('logs/levels.log', Logger::DEBUG));

$levelsLog->debug('Debug повідомлення');
$levelsLog->info('Info повідомлення');
$levelsLog->notice('Notice повідомлення');
$levelsLog->warning('Warning повідомлення');
$levelsLog->error('Error повідомлення');
$levelsLog->critical('Critical повідомлення');
$levelsLog->alert('Alert повідомлення');
$levelsLog->emergency('Emergency повідомлення');

echo "Різні рівні логування записані в logs/levels.log\n\n";

echo "=== Демонстрація завершена ===\n";
echo "Перевірте папку logs/ для перегляду створених лог-файлів\n";
