<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$paramArray = ['id' => $argv[1]];

$dbConnection = ConnectionFactory::createConnection();

$dbConnection->beginTransaction();
$deleteStatement = $dbConnection->prepare('DELETE FROM numbers WHERE id=:id');
$deleteStatement->execute($paramArray);

$selectStatement = $dbConnection->prepare('SELECT * FROM numbers WHERE id <= :id');
$selectStatement->execute($paramArray);
$numbers = $selectStatement->fetchAll();

echo 'In transaction:' . PHP_EOL;
include __DIR__ . '/../view/numbers.php';

$dbConnection->rollBack();

$selectStatement->execute($paramArray);
$numbers = $selectStatement->fetchAll();

echo 'After rollback:' . PHP_EOL;
include __DIR__ . '/../view/numbers.php';
