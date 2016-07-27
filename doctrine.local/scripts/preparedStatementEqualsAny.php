<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$ids = $argv[1];
$idsArray = explode(',', $ids);

$sqlStatement = "SELECT * FROM numbers WHERE id = ANY :ids";

$dbConnection = ConnectionFactory::createConnection();
$preparedStatement = $dbConnection->prepare($sqlStatement);
$preparedStatement->execute(['ids'=>$ids]);
$numbers = $preparedStatement->fetchAll();

include __DIR__ . '/../view/numbers.php';
