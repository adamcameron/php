<?php

namespace doctrineTest\factory;

class ConnectionFactory {

    private $connectionConfig;

    public function __construct($connectionConfig) {
        $this->connectionConfig = $connectionConfig;
    }

    public function createConnection() {
        $connectionString = sprintf(
            "mysql:host=%s;port=%s;dbname=%s",
            $this->connectionConfig->host,
            $this->connectionConfig->port,
            $this->connectionConfig->dbname
        );
        $dbConnection = new \PDO(
            $connectionString,
            $this->connectionConfig->user,
            $this->connectionConfig->password
        );

        return $dbConnection;
    }
}
