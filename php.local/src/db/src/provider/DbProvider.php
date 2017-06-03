<?php

namespace me\adamcameron\db\provider;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Connections\MasterSlaveConnection;
use Doctrine\DBAL\DriverManager;
use me\adamcameron\db\model\DbConfig;

class DbProvider
{
    public static function getMasterSlaveConnection(DbConfig $dbConfig) : Connection
    {
        return DriverManager::getConnection([
            'wrapperClass' => MasterSlaveConnection::class,
            'driver' => 'pdo_mysql',
            'master' => [
                'user' => $dbConfig->master->user,
                'password' => $dbConfig->master->password,
                'host' => $dbConfig->master->host,
                'port' => $dbConfig->master->port,
                'dbname' => $dbConfig->master->dbname
            ],
            'slaves' => [
                [
                    'user' => $dbConfig->slave->user,
                    'password' => $dbConfig->slave->password,
                    'host' => $dbConfig->slave->host,
                    'port' => $dbConfig->slave->port,
                    'dbname' => $dbConfig->slave->dbname
                ]
            ]
        ]);
    }
}