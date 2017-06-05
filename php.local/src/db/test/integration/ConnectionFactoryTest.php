<?php

namespace me\adamcameron\db\test\integration;

use Doctrine\DBAL\Connection;
use me\adamcameron\db\ConnectionFactory;
use me\adamcameron\db\DbConfig;
use PHPUnit\Framework\TestCase;

class DbConfigTest extends TestCase
{
    private $factory;

    public function setup()
    {
        $configFile = __DIR__. '/../../config/db.json';
        $config = new DbConfig($configFile);

        $this->factory = new ConnectionFactory($config);
    }

    public function testConnection()
    {
        $connection = $this->factory->getConnection();

        $version = $connection->executeQuery('SELECT @@version AS version')->fetchAll();

        $this->assertCount(1, $version);
        $this->assertArrayHasKey('version', $version[0]);

        $connection->connect('master');
        $version = $connection->executeQuery('SELECT @@version AS version')->fetchAll();

        $this->assertCount(1, $version);
        $this->assertArrayHasKey('version', $version[0]);
    }

}
