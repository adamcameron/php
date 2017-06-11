<?php

namespace me\adamcameron\silex2\test\provider;

use me\adamcameron\silex2\app\Application;
use me\adamcameron\silex2\provider\ControllerProvider;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass  \me\adamcameron\silex2\provider\ControllerProvider */
class ControllerProviderTest extends TestCase
{
    private $provider;
    private $app;

    public function setup()
    {
        $this->app = new Application([]);
        $this->provider = new ControllerProvider();
    }

    /** @covers ::register */
    public function testRegister()
    {
        $this->provider->register($this->app);
        self::verifyControllers($this->app, $this);
    }

    public static function verifyControllers(Application $app, TestCase $testCase)
    {
        $routes = $app['routes']->getIterator();
        foreach ($routes as $route) {
            $controller = $route->getDefault('_controller');
            list($controllerKey, $controllerMethod) = explode(':', $controller);

            $testCase->assertArrayHasKey($controllerKey, $app);
            $testCase->assertTrue(method_exists($app[$controllerKey], $controllerMethod));
        }
    }
}
