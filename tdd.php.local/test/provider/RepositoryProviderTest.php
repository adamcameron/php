<?php

namespace provider;

use me\adamcameron\tdd\provider\RepositoryProvider;
use me\adamcameron\tdd\repository\PersonRepository;
use me\adamcameron\tdd\test\provider\ProviderTest;

/** @coversDefaultClass \me\adamcameron\tdd\provider\RepositoryProvider */
class RepositoryProviderTest extends ProviderTest
{
    protected $sut = RepositoryProvider::class;

    /** @covers ::register */
    public function testRegister()
    {
        $this->provider->register($this->container);

        $this->assertArrayHasKey('repository.person', $this->container);
        $this->assertInstanceOf(PersonRepository::class, $this->container['repository.person']);
    }
}
