<?php

require_once 'vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;

// Демонстрація роботи Symfony VarDumper

echo "=== Symfony VarDumper Demo ===\n\n";

// 1. Базове використання dump()
echo "1. Базове використання dump():\n";
$data = [
    'name' => 'John Doe',
    'age' => 30,
    'email' => 'john@example.com',
    'hobbies' => ['reading', 'coding', 'gaming']
];
dump($data);

echo "\n2. Dump масиву з різними типами даних:\n";
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

echo "\n3. Dump об'єкта:\n";
$user = new stdClass();
$user->name = 'Jane Smith';
$user->role = 'admin';
$user->permissions = ['read', 'write', 'delete'];
dump($user);

echo "\n4. Dump з контекстом (dd - dump and die):\n";
$numbers = [1, 2, 3, 4, 5];
dd($numbers); // Цей рядок зупинить виконання скрипта
