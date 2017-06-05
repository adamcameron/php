<?php


namespace me\adamcameron\db\test\app;

use Doctrine\DBAL\Connections\MasterSlaveConnection;
use me\adamcameron\db\app\Application;
use me\adamcameron\db\dao\ColoursDAO;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    private $app;

    public function setup()
    {
        $this->app = new Application();
    }

    public function testDependencies()
    {
        $this->assertArrayHasKey('db.connection', $this->app);
        $this->assertInstanceOf(MasterSlaveConnection::class, $this->app['db.connection']);

        $this->assertArrayHasKey('dao.colours', $this->app);
        $this->assertInstanceOf(ColoursDAO::class, $this->app['dao.colours']);
    }
}
