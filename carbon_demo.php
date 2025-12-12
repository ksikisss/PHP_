<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;

// Демонстрація роботи Carbon (дата і час)

echo "=== Carbon Demo ===\n\n";

// 1. Створення об'єктів Carbon
echo "1. Створення об'єктів Carbon:\n";

// Поточний час
$now = Carbon::now();
echo "Поточний час: " . $now->toDateTimeString() . "\n";

// Конкретна дата
$specificDate = Carbon::create(2024, 12, 25, 10, 30, 0);
echo "Конкретна дата: " . $specificDate->toDateTimeString() . "\n";

// З рядка
$dateFromString = Carbon::parse('2024-01-15 14:20:30');
echo "З рядка: " . $dateFromString->toDateTimeString() . "\n\n";

// 2. Форматування дат
echo "2. Форматування дат:\n";
$date = Carbon::create(2024, 3, 15, 9, 45, 30);

echo "ISO формат: " . $date->toISOString() . "\n";
echo "Людський формат: " . $date->format('l, F j, Y \a\t g:i A') . "\n";
echo "Український формат: " . $date->locale('uk')->isoFormat('dddd, D MMMM YYYY [о] HH:mm') . "\n\n";

// 3. Маніпуляції з датами
echo "3. Маніпуляції з датами:\n";
$baseDate = Carbon::create(2024, 6, 15);

echo "Базова дата: " . $baseDate->toDateString() . "\n";
echo "Через тиждень: " . $baseDate->addWeek()->toDateString() . "\n";
echo "Через місяць: " . $baseDate->addMonth()->toDateString() . "\n";
echo "Через рік: " . $baseDate->addYear()->toDateString() . "\n";
echo "Мінус 5 днів: " . $baseDate->subDays(5)->toDateString() . "\n\n";

// 4. Порівняння дат
echo "4. Порівняння дат:\n";
$date1 = Carbon::create(2024, 6, 15);
$date2 = Carbon::create(2024, 6, 20);

echo "Дата 1: " . $date1->toDateString() . "\n";
echo "Дата 2: " . $date2->toDateString() . "\n";
echo "Дата 1 < Дата 2: " . ($date1->lt($date2) ? 'Так' : 'Ні') . "\n";
echo "Дата 1 > Дата 2: " . ($date1->gt($date2) ? 'Так' : 'Ні') . "\n";
echo "Дата 1 == Дата 2: " . ($date1->eq($date2) ? 'Так' : 'Ні') . "\n";
echo "Різниця в днях: " . $date1->diffInDays($date2) . " днів\n\n";

// 5. Інтервали часу
echo "5. Інтервали часу:\n";
$interval = CarbonInterval::days(3)->hours(5)->minutes(30);
echo "Інтервал: " . $interval->forHumans() . "\n";

$start = Carbon::now();
$end = $start->copy()->add($interval);
echo "Початок: " . $start->toDateTimeString() . "\n";
echo "Кінець: " . $end->toDateTimeString() . "\n\n";

// 6. Робота з часовими поясами
echo "6. Робота з часовими поясами:\n";
$utc = Carbon::now('UTC');
echo "UTC: " . $utc->toDateTimeString() . "\n";

$kyiv = $utc->setTimezone('Europe/Kiev');
echo "Київ: " . $kyiv->toDateTimeString() . "\n";

$london = $utc->setTimezone('Europe/London');
echo "Лондон: " . $london->toDateTimeString() . "\n\n";

// 7. Корисні методи
echo "7. Корисні методи:\n";
$testDate = Carbon::create(2024, 2, 15);

echo "Дата: " . $testDate->toDateString() . "\n";
echo "День тижня: " . $testDate->dayName . "\n";
echo "Місяць: " . $testDate->monthName . "\n";
echo "Рік високосний: " . ($testDate->isLeapYear() ? 'Так' : 'Ні') . "\n";
echo "Кінець місяця: " . $testDate->endOfMonth()->toDateString() . "\n";
echo "Початок тижня: " . $testDate->startOfWeek()->toDateString() . "\n\n";

echo "=== Демонстрація завершена ===\n";
