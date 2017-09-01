<?php


namespace me\adamcameron\general\db\test\app;

use Doctrine\DBAL\Connections\MasterSlaveConnection;
use me\adamcameron\general\db\app\Application;
use me\adamcameron\general\db\dao\ColoursDAO;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
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
