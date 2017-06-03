<?php

namespace provider;

use me\adamcameron\tdd\provider\ServiceProvider;
use me\adamcameron\tdd\repository\PersonService;
use me\adamcameron\tdd\test\provider\ProviderTest;

/** @coversDefaultClass \me\adamcameron\tdd\provider\ServiceProvider */
class ServiceProviderTest extends ProviderTest
{
    protected $sut = ServiceProvider::class;

    public function setup()
    {
        parent::setup();
        $this->setPersonRepositoryInApplication();
    }

    /** @covers ::register */
    public function testRegister()
    {
        $this->provider->register($this->container);

        $this->assertArrayHasKey('service.person', $this->container);
        $this->assertInstanceOf(PersonRepository::class, $this->container['service.person']);
    }
}
