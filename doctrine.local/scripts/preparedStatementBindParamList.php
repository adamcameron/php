<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;
use doctrineTest\pdo\ParameterHelper;

$ids = $argv[1];
$idsArray = explode(',', $ids);

$paramPlaceholders = ParameterHelper::createParameterListForSqlStatement($idsArray);
$sqlStatement = "SELECT * FROM numbers WHERE id IN ($paramPlaceholders)";

$dbConnection = ConnectionFactory::createConnection();
$preparedStatement = $dbConnection->prepare($sqlStatement);
$preparedStatement->execute($idsArray);
$numbers = $preparedStatement->fetchAll();

include __DIR__ . '/../view/numbers.php';
