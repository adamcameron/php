<?php

namespace me\adamcameron\silex2\test\functional\provider;

use me\adamcameron\silex2\app\Application;
use me\adamcameron\silex2\repository\NumberRepository;
use PHPUnit\Framework\TestCase;

class FactoryProviderTest extends TestCase
{
    private $provider;
    private $app;

    public function setup()
    {
        $this->app = new Application([]);
    }

    public function testNumberFactory()
    {
        $one = $this->app['factory.number'](1, 'tahi');

        $this->assertEquals(1, $one->id);
        $this->assertEquals('tahi', $one->name);
    }
}
