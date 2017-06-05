<?php

namespace me\adamcameron\db\test\unit;

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

    public function testGetConnection()
    {
        $connection = $this->factory->getConnection();

        $this->assertInstanceOf(Connection::class, $connection);
    }
}
