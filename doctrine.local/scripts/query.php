<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$dbConnection = ConnectionFactory::createConnection();

$numbers = $dbConnection->query('SELECT * FROM numbers');

foreach ($numbers as $row) {
    printf('%s: English: %s, Maori: %s%s', $row['id'], $row['en'], $row['mi'], PHP_EOL);
}

