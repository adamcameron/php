<?php

namespace me\adamcameron\db\test\integration;

use me\adamcameron\db\ConnectionFactory;
use me\adamcameron\db\DbConfig;
use me\adamcameron\db\MyDAO;
use PHPUnit\Framework\TestCase;

class MyDAOTest extends TestCase
{

    private $dao;

    public function setup()
    {
        $configFile = __DIR__. '/../../config/db.json';
        $config = new DbConfig($configFile);
        $connectionFactory = new ConnectionFactory($config);
        $connection = $connectionFactory->getConnection();
        $this->dao = new MyDAO($connection);
    }

    public function testSelectFirstFour()
    {
        $numbers = $this->dao->selectFirstFour();

        $expected = [
            ['id' => 1, 'en' => 'one', 'mi' => 'TAHI'],
            ['id' => 2, 'en' => 'TWO', 'mi' => 'rua'],
            ['id' => 3, 'en' => 'three', 'mi' => 'toru'],
            ['id' => 4, 'en' => 'four', 'mi' => 'wha']
        ];
        $this->assertEquals($expected, $numbers);
    }

    /** @group connectionStatusTests */
    public function testSelectLastFour()
    {
        $numbers = $this->dao->selectLastFour();

        $expected = [
            ['id' => 7, 'en' => 'seven', 'mi' => 'whitu'],
            ['id' => 8, 'en' => 'eight', 'mi' => 'waru'],
            ['id' => 9, 'en' => 'nine', 'mi' => 'iwa'],
            ['id' => 10, 'en' => 'ten', 'mi' => 'tekau']
        ];
        $this->assertEquals($expected, $numbers);
    }
}
