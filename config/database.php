<?php

use Dotenv\Dotenv;

$ROOT_DIR = dirname(__DIR__);

$dotenv = Dotenv::createImmutable($ROOT_DIR);
$dotenv->load();

return [
    'mysql' => [
        'driver' => 'mysql',
        'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
        'port' => $_ENV['DB_PORT'] ?? '3306',
        'database' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'] ?? '',
    ]
];
