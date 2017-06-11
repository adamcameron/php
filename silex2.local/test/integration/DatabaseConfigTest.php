<?php

namespace me\adamcameron\silex2\test\provider;

use me\adamcameron\silex2\provider\ConfigProvider;
use PHPUnit\Framework\TestCase;
use Pimple\Container;

class DatabaseConfigTest extends TestCase
{
    private $dbConfig;

    public function setup()
    {
        putenv('deployment_environment=dev');
        $container = new Container();
        $provider = new ConfigProvider();
        $provider->register($container);

        $this->dbConfig = $container['db'];
    }

    public function testDatabaseConnectivity()
    {
        $connectionString = sprintf(
            'mysql:host=%s;port=%s;dbname=%s',
            $this->dbConfig['host'],
            $this->dbConfig['port'],
            $this->dbConfig['database']
        );
        $dbConnection = new \PDO(
            $connectionString,
            $this->dbConfig['login'],
            $this->dbConfig['password']
        );
        $version = $dbConnection->query('SELECT @@VERSION AS version')->fetchColumn();
        $this->assertNotNull($version);
    }
}
