<?php

namespace me\adamcameron\tdd\test\provider;

use me\adamcameron\tdd\model\Person;
use me\adamcameron\tdd\provider\FactoryProvider;

/** @coversDefaultClass  \me\adamcameron\tdd\provider\FactoryProvider */
class FactoryProviderTest extends ProviderTest
{
    protected $sut = FactoryProvider::class;

    /** @covers ::register */
    public function testRegister()
    {
        $this->provider->register($this->container);

        $this->assertArrayHasKey('factory.person', $this->container);
        $person = ($this->container['factory.person'])('MOCK_VALUE', 'MOCK_VALUE');
        $this->assertInstanceOf(Person::class, $person);
    }
}
