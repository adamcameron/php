<?php

namespace me\adamcameron\general\test\tdd\fixingExistingTests;

use me\adamcameron\general\tdd\fixingExistingTests\Thing;
use me\adamcameron\general\tdd\fixingExistingTests\ThingRepository;
use PHPUnit\Framework\TestCase;

class ThingRepositoryTest extends TestCase {

    private $repository;

    protected function setUp() : void {
        $this->repository = new ThingRepository();
    }

    public function testGetThingReturnsCorrectThingForId(){
        $testId = 17;
        $expectedName = "Thing 1";
        $thing = $this->repository->getThing(17);

        $this->assertInstanceOf(Thing::class, $thing);
        $this->assertSame($testId, $thing->id);
        $this->assertSame($expectedName, $thing->name);
    }
}