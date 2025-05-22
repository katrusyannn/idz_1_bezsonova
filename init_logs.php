<?php
// init_logs.php
// Запустити один раз з CLI: php init_logs.php

// Підключаємо PDO до SQLite-файлу
$logDb = new PDO('sqlite:' . __DIR__ . '/logs.db');
$logDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Створюємо таблицю, якщо її ще нема
$logDb->exec("
    CREATE TABLE IF NOT EXISTS request_log (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        script TEXT NOT NULL,
        params TEXT NOT NULL,
        requested_at DATETIME NOT NULL
    )
");

echo "SQLite логування налаштовано.\n";

