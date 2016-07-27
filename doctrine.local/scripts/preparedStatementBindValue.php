<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$upperThreshold = $argv[1];

$dbConnection = ConnectionFactory::createConnection();
$preparedStatement = $dbConnection->prepare('SELECT * FROM numbers WHERE id <= :upperThreshold');
$preparedStatement->bindValue(':upperThreshold', $upperThreshold, PDO::PARAM_INT);
$preparedStatement->execute();
$numbers = $preparedStatement->fetchAll();

foreach ($numbers as $row) {
    printf('%s: English: %s, Maori: %s%s', $row['id'], $row['en'], $row['mi'], PHP_EOL);
}

