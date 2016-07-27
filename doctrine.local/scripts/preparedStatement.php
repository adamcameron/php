<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$dbConnection = ConnectionFactory::createConnection();

$preparedStatement = $dbConnection->prepare('SELECT * FROM numbers WHERE id <= :upperThreshold');
$preparedStatement->execute(['upperThreshold' => 4]);

$numbers = $preparedStatement->fetchAll();

foreach ($numbers as $row) {
    printf('%s: English: %s, Maori: %s%s', $row['id'], $row['en'], $row['mi'], PHP_EOL);
}

