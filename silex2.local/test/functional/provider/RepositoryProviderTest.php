<?php

namespace me\adamcameron\silex2\test\functional\provider;

use me\adamcameron\silex2\app\Application;
use me\adamcameron\silex2\provider\RepositoryProvider;
use me\adamcameron\silex2\repository\NumberRepository;
use PHPUnit\Framework\TestCase;

class RepositoryProviderTest extends TestCase
{
    private $provider;
    private $app;

    public function setup()
    {
        $this->app = new Application([]);
        $this->provider = new RepositoryProvider();
    }

    public function testRegister()
    {
        $this->provider->register($this->app);

        self::verifyRepositories($this->app, $this);
    }

    public static function verifyRepositories(Application $app, TestCase $testCase)
    {
        $testCase->assertArrayHasKey('repository.number', $app);
        $testCase->assertInstanceOf(NumberRepository::class, $app['repository.number']);
    }
}
