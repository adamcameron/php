<?php

use \Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';

$conf = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'scratch',
    'user' => 'scratch',
    'password' => 'scratch'
];

$connection = DriverManager::getConnection($conf);

$connection->executeUpdate("
        UPDATE numbers SET mi = 'TAHI' WHERE id = :id1;
        UPDATE numbers set en = 'TWO' WHERE id = :id2
    ", [
    'id1' => 1,
    'id2' => 2
]);
