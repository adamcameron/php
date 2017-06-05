<?php

namespace me\adamcameron\db;

use Doctrine\DBAL\Connections\MasterSlaveConnection;
use Doctrine\DBAL\DriverManager;

class ConnectionFactory
{
    private $config;

    public function __construct(DbConfig $config)
    {
        $this->config = $config;
    }

    public function getConnection()
    {
        $masterConfig = [
            'user' => $this->config->master->username,
            'password' => $this->config->master->password,
            'host' => $this->config->host,
            'dbname' => $this->config->dbname
        ];
        $slaveConfig = [
            'user' => $this->config->slave->username,
            'password' => $this->config->slave->password,
            'host' => $this->config->host,
            'dbname' => $this->config->dbname
        ];

        return DriverManager::getConnection(
            [
                'wrapperClass' => MasterSlaveConnection::class,
                'driver' => $this->config->driver,
                'master' => $masterConfig,
                'slaves' => [$slaveConfig]
            ]
        );
    }
}
