<?php
require_once __DIR__ . '/../vendor/autoload.php';

use doctrineTest\pdo\ConnectionFactory;

$dbConnection = ConnectionFactory::createConnection();

$numbers = $dbConnection->query('SELECT * FROM numbers');

include __DIR__ . '/../view/numbers.php';


