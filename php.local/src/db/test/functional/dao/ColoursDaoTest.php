<?php

namespace me\adamcameron\db\test\functional\dao;

use Doctrine\DBAL\DBALException;
use me\adamcameron\db\model\Colour;
use PHPUnit\Framework\TestCase;

abstract class ColoursDaoTest extends TestCase
{

    protected $dao;
    protected $connection;

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

    public function testConnectionAfterShortenedTimeoutUsingClosedConnection()
    {
        $this->verifyDbWaitTimeout();

        $timeout = 5;

        $stmt = $this->connection->prepare('SET SESSION WAIT_TIMEOUT = :timeout');
        $stmt->bindValue("timeout", $timeout, \PDO::PARAM_INT);
        $stmt->execute();

        $result = $this->dao->getColourByIdAndCloseConnection(7, $timeout);

        $expected = new Colour(7, 'purple', 'papura');
        $this->assertEquals($expected, $result);

        sleep($timeout + 1);

        $this->dao->getColourById(1);
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
