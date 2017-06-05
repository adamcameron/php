<?php

namespace me\adamcameron\db\test\functional;

use me\adamcameron\db\DbConfig;
use PHPUnit\Framework\TestCase;

class DbConfigTest extends TestCase
{

    public function testConstruct()
    {
        $file = realpath(__DIR__ . '/../../config/db.json');
        $dbConfig = new DbConfig($file);

        $expected = (object) [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'scratch',
            'master' => (object) [
                'username' => 'scratch',
                'password' => 'scratch'
            ],
            'slave' => (object) [
                'username' => 'scratch_slave',
                'password' => 'scratch_slave'
            ]
        ];
        $this->assertSame($expected->driver, $dbConfig->driver);
        $this->assertSame($expected->host, $dbConfig->host);
        $this->assertSame($expected->port, $dbConfig->port);
        $this->assertSame($expected->dbname, $dbConfig->dbname);
        $this->assertSame($expected->master->username, $dbConfig->master->username);
        $this->assertSame($expected->master->password, $dbConfig->master->password);
        $this->assertSame($expected->slave->username, $dbConfig->slave->username);
        $this->assertSame($expected->slave->password, $dbConfig->slave->password);
    }
}
