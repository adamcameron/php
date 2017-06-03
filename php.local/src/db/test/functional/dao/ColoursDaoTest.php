<?php

namespace me\adamcameron\db\test\dao;

use Doctrine\DBAL\DBALException;
use me\adamcameron\db\dao\ColoursDAO;
use me\adamcameron\db\model\Colour;
use me\adamcameron\db\provider\ConfigProvider;
use me\adamcameron\db\provider\DbProvider;
use PHPUnit\Framework\TestCase;

class ColoursDaoTest extends TestCase
{

    /** @var ColoursDAO */
    private $dao;
    private $connection;

    public function setup()
    {
        $file = ConfigProvider::getDefaultConfigDirectory() . '/db.json';
        $config = ConfigProvider::getDbConfigFromFile($file);
        $this->connection = DbProvider::getMasterSlaveConnection($config);
        $this->dao = new ColoursDAO($this->connection);
    }

    public function testBasicConnection()
    {
        $expected = new Colour(1, 'red', 'whero');
        $result = $this->dao->getColourById(1);
        $this->assertEquals($expected, $result);
    }

    public function testClosedConnection()
    {
        $expected = new Colour(2, 'orange', 'karaka');
        $result = $this->dao->getColourByIdAndCloseConnection(2);
        $this->assertEquals($expected, $result);

        $expected = new Colour(3, 'yellow', 'kowhai');
        $result = $this->dao->getColourByIdAndCloseConnection(3);
        $this->assertEquals($expected, $result);
    }

    public function testConnectionAfterTimeout()
    {
        $this->verifyDbWaitTimeout();

        $expected = new Colour(4, 'green', 'kakariki');
        $result = $this->dao->getColourById(4);
        $this->assertEquals($expected, $result);

        sleep(25);

        $this->expectException(DBALException::class);
        $this->dao->getColourById(5);
    }

    public function testConnectionAfterShortenedDaoTimeout()
    {
        $this->verifyDbWaitTimeout();

        $timeout = 5;
        $result = $this->dao->getColourByIdWithShortenedTimeout(5, $timeout);

        $expected = new Colour(5, 'blue', 'kikorangi');
        $this->assertEquals($expected, $result);

        sleep($timeout + 1);

        $this->expectException(DBALException::class);

        $this->dao->getColourById(6);
    }

    public function testConnectionAfterShortenedTestTimeout()
    {
        $this->verifyDbWaitTimeout();

        $timeout = 5;

        $stmt = $this->connection->prepare('SET SESSION WAIT_TIMEOUT = :timeout');
        $stmt->bindValue("timeout", $timeout, \PDO::PARAM_INT);
        $stmt->execute();


        $result = $this->dao->getColourById(6, $timeout);

        $expected = new Colour(6, 'indigo', 'poropango');
        $this->assertEquals($expected, $result);

        sleep($timeout + 1);

        $this->expectException(DBALException::class);

        $this->dao->getColourById(7);
    }

    private function verifyDbWaitTimeout()
    {
        $currentWaitTimeout = (int) $this->connection->executeQuery('SELECT @@WAIT_TIMEOUT AS WAIT_TIMEOUT')->fetchColumn();
        if ($currentWaitTimeout !== 20) {
            $message = "DB timeout not set correctly for test. Expects WAIT_TIMEOUT to be 20, but found $currentWaitTimeout";
            echo $message;
            $this->markTestSkipped($message);
        }
    }
}
