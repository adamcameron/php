<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$dbConnection = ConnectionFactory::createConnection();

$preparedStatement = $dbConnection->prepare('SELECT * FROM numbers WHERE id <= :upperThreshold');
$preparedStatement->execute(['upperThreshold' => $argv[1]]);

$numbers = $preparedStatement->fetchAll();

include __DIR__ . '/../view/numbers.php';
