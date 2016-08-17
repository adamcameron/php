<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$upperThreshold = $argv[1];

$dbConnection = ConnectionFactory::createConnection();
$preparedStatement = $dbConnection->prepare('SELECT * FROM numbers WHERE id <= :upperThreshold');
$preparedStatement->bindValue(':upperThreshold', $upperThreshold, PDO::PARAM_INT);
$preparedStatement->execute();
$numbers = $preparedStatement->fetchAll();

include __DIR__ . '/../view/numbers.php';
