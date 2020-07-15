<?php

namespace me\adamcameron\general\test\tdd\fixingExistingTests;

use me\adamcameron\general\tdd\fixingExistingTests\Thing;
use me\adamcameron\general\tdd\fixingExistingTests\ThingDao;
use me\adamcameron\general\tdd\fixingExistingTests\ThingRepositoryWithDaoDependency;
use PHPUnit\Framework\TestCase;

class ThingRepositoryExistingTestUpdatedTest extends TestCase {

    private $repository;
    private $dao;

    protected function setUp() : void {
        $this->dao = $this->createMock(ThingDao::class);
        $this->repository = new ThingRepositoryWithDaoDependency($this->dao);
    }

    public function testGetThingReturnsCorrectThingForId(){
        $testId = 17;
        $expectedName = "Thing 1";

        $this->dao->expects($this->once())
            ->method('getThing')
            ->with($testId)
            ->willReturn(['id' => $testId, 'name' => $expectedName]);

        $thing = $this->repository->getThing(17);

        $this->assertInstanceOf(Thing::class, $thing);
        $this->assertSame($testId, $thing->id);
        $this->assertSame($expectedName, $thing->name);
    }

    public function testGetThingUsesDaoPassedIntoConstructor()
    {
        $this->testGetThingReturnsCorrectThingForId();
    }
}