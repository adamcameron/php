<?php

namespace me\adamcameron\tdd\test\provider;

use me\adamcameron\tdd\app\TddApplication;
use me\adamcameron\tdd\controller\HelloController;
use me\adamcameron\tdd\controller\PersonController;
use me\adamcameron\tdd\provider\ControllerProvider;

/** @coversDefaultClass \me\adamcameron\tdd\provider\ControllerProvider  */
class ControllerProviderTest extends ProviderTest
{
    protected $sut = ControllerProvider::class;

    /** @covers ::register */
    public function testRegister()
    {
        $app = new TddApplication([]);

        $this->provider->register($app);
        $this->assertArrayHasKey('controller.hello', $app);
        $this->assertInstanceOf(HelloController::class, $app['controller.hello']);

        $this->assertArrayHasKey('controller.person', $app);
        $this->assertInstanceOf(PersonController::class, $app['controller.person']);
    }
}
