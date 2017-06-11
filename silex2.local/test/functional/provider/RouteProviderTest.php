<?php

namespace me\adamcameron\silex2\test\provider;

use me\adamcameron\silex2\app\Application;
use me\adamcameron\silex2\provider\RouteProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/** @coversDefaultClass  \me\adamcameron\silex2\provider\RouteProvider */
class RouteProviderTest extends TestCase
{
    private $provider;
    private $app;

    public function setup()
    {
        $this->app = new Application([]);
        $this->provider = new RouteProvider();
    }

    /** @covers ::register */
    public function testRegister()
    {
        $this->provider->register($this->app);

        self::verifyRoutes($this->app, $this);
    }

    public static function verifyRoutes(Application $app, TestCase $testCase)
    {
        $testCase->assertArrayHasKey('routes', $app);
        $testCase->assertInstanceOf(RouteCollection::class, $app['routes']);

        $routeMap = self::getRouteMap();
        array_walk($routeMap, function ($path, $label) use ($app, $testCase) {
            $route = $app['routes']->get($label);
            $testCase->assertInstanceOf(Route::class, $route);
            $testCase->assertSame($path, $route->getPath());
        });
    }

    private static function getRouteMap()
    {
        return [
            '_homeRoute' => '/',
            '_numberRoute' => '/number/{id}/lang/{lang}'
        ];
    }
}
