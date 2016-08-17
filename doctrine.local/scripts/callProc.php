<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$id = $argv[1];

$dbConnection = ConnectionFactory::createConnection();

$preparedStatement = $dbConnection->prepare('call getThingsById(:id)');
$preparedStatement->execute(['id' => $id]);

$resultSet = $preparedStatement->fetchAll();
include __DIR__ . '/../view/general.php';

$preparedStatement->nextRowset();

$resultSet = $preparedStatement->fetchAll();
include __DIR__ . '/../view/general.php';

$preparedStatement->nextRowset();

$resultSet = $preparedStatement->fetchAll();
include __DIR__ . '/../view/general.php';

