<?php

namespace me\adamcameron\general\db\test\integration\dao;

use Doctrine\DBAL\Connection;
use me\adamcameron\general\db\dao\PeopleDAO;
use me\adamcameron\general\db\provider\ConfigProvider;
use me\adamcameron\general\db\provider\DbProvider;
use PHPUnit\Framework\TestCase;

class PeopleDaoTest extends TestCase
{

    /** @var  Connection */
    private $connection;

    /** @var  PeopleDAO */
    private $dao;

    public function setup()
    {
        $file = ConfigProvider::getDefaultConfigDirectory() . '/db.json';
        $config = ConfigProvider::getDbConfigFromFile($file);
        $this->connection = DbProvider::getMasterSlaveConnection($config);
        $this->dao = new PeopleDAO($this->connection);
    }

    public function testGetNameByFirstChar()
    {
        $testLetter = 'a';
        $names = $this->dao->getNameByFirstChar($testLetter);

        if (!count($names)) {
            $this->markTestSkipped('count not find records to test');
            return;
        }

        array_walk($names, function ($row, $key) use ($testLetter) {
            $this->assertStringStartsWith($testLetter, strtolower($key));
            $this->assertEquals(['id', 'rank', 'gender'], array_keys($row));
            $this->assertNotNull($row['id']);
            $this->assertNotNull($row['rank']);
            $this->assertNotNull($row['gender']);
        });
    }
}
