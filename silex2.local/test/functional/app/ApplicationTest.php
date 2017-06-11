<?php

namespace me\adamcameron\silex2\test\functional\app;

use me\adamcameron\silex2\app\Application;
use me\adamcameron\silex2\test\functional\provider\ServiceProviderTest;
use me\adamcameron\silex2\test\provider\ControllerProviderTest;
use me\adamcameron\silex2\test\provider\RouteProviderTest;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass  \me\adamcameron\silex2\app\Application */
class ApplicationTest extends TestCase
{

    public function testBootstrap()
    {
        $app = null;
        $this->setOutputCallback(function () {
        });
        require realpath(__DIR__ . '/../../../src/app/bootstrap.php');

        $this->assertInstanceOf(Application::class, $app);
    }

    /**
     * @covers ::__construct
     * @covers ::registerProviders
     */
    public function testConfigIsSet()
    {
        $app = new Application([]);

        $this->assertArrayHasKey('env', $app);
        $this->assertSame('test', $app['env']);
    }

    /**
     * @covers ::__construct
     * @covers ::registerProviders
     */
    public function testRoutingIsSet()
    {
        $app = new Application([]);

        RouteProviderTest::verifyRoutes($app, $this);
    }
    /**
     * @covers ::__construct
     * @covers ::registerProviders
     */
    public function testControllersAreSet()
    {
        $app = new Application([]);

        ControllerProviderTest::verifyControllers($app, $this);
    }

    public function testServicesAreSet()
    {
        $app = new Application([]);
        ServiceProviderTest::verifyServices($app, $this);
    }
}
