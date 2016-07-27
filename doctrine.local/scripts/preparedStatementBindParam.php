<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$upperThreshold = 1;

$dbConnection = ConnectionFactory::createConnection();
$preparedStatement = $dbConnection->prepare('SELECT * FROM numbers WHERE id <= :upperThreshold');
$preparedStatement->bindParam(':upperThreshold', $upperThreshold, PDO::PARAM_INT);

$upperThreshold = 10;
$preparedStatement->execute();
$numbers = $preparedStatement->fetchAll();

include __DIR__ . '/../view/numbers.php';
