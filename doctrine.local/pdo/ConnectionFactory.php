<?php

namespace doctrineTest\pdo;

class ConnectionFactory {

    private static $host = 'localhost';
    private static $port = '3306';
    private static $dbName = 'scratch';

    public static function createConnection() {
        $connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s', self::$host, self::$port, self::$dbName);
        $dbConnection = new \PDO($connectionString, Credentials::$login, Credentials::$password);

        return $dbConnection;
    }
}
