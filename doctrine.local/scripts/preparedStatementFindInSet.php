<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$ids = $argv[1];

$sqlStatement = "SELECT * FROM numbers WHERE FIND_IN_SET(id, :ids)";

$dbConnection = ConnectionFactory::createConnection();
$preparedStatement = $dbConnection->prepare($sqlStatement);
$preparedStatement->execute(['ids'=>$ids]);
$numbers = $preparedStatement->fetchAll();

include __DIR__ . '/../view/numbers.php';
