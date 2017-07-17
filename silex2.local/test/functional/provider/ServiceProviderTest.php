<?php

namespace me\adamcameron\silex2\test\functional\provider;

use me\adamcameron\silex2\app\Application;
use me\adamcameron\silex2\provider\ServiceProvider;
use PHPUnit\Framework\TestCase;

class ServiceProviderTest extends TestCase
{
    private $provider;
    private $app;

    public function setup()
    {
        $this->app = new Application([]);
        $this->provider = new ServiceProvider();
    }

    public function testRegister()
    {
        $this->provider->register($this->app);

        self::verifyServices($this->app, $this);
    }

    public static function verifyServices(Application $app, TestCase $testCase)
    {
        $testCase->assertArrayHasKey('twig', $app);
        $testCase->assertInstanceOf(\Twig_Environment::class, $app['twig']);
    }
}
