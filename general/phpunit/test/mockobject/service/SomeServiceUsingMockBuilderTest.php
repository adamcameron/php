<?php

namespace me\adamcameron\phpunit\test\mockobject\service;

use me\adamcameron\phpunit\mockobject\repository\SomeRepository;
use \me\adamcameron\phpunit\mockobject\service\SomeService;
use PHPUnit\Framework\TestCase;

class SomeServiceUsingMockBuilderTest extends TestCase
{

    private $someService;
    private $testId = "TEST_ID";
    private $testThing;
    private $mockedGetTheThingResult;
    private $mockedDoesTheThingExistResult = false;

    public function setup()
    {
        $this->testThing = (object) ["id" => $this->testId];
        $this->mockedGetTheThingResult = $this->testThing;

        $mockedSomeRepository = $this->getMockedSomeRepository();
        $this->someService = new SomeService($mockedSomeRepository);
    }

    public function testGetTheThing()
    {
        $result = $this->someService->getTheThing($this->testId);

        $this->assertEquals($this->mockedGetTheThingResult, $result);
    }

    public function testSetTheThing()
    {
        $this->someService->setTheThing($this->testId, $this->testThing);
    }

    public function testDoesTheThingExist()
    {
        $result = $this->someService->doesTheThingExist($this->testId);
        $this->assertEquals($this->mockedDoesTheThingExistResult, $result);
    }

    private function getMockedSomeRepository()
    {
        $mockedSomeRepository = $this
            ->getMockBuilder(SomeRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(["getTheThing", "setTheThing", "doesTheThingExist"])
            ->getMock();

        $mockedSomeRepository
            ->method("getTheThing")
            ->with($this->testId)
            ->willReturn($this->mockedGetTheThingResult);

        $mockedSomeRepository
            ->method("setTheThing")
            ->with($this->testId, $this->testThing);

        $mockedSomeRepository
            ->method("doesTheThingExist")
            ->with($this->testId)
            ->willReturn($this->mockedDoesTheThingExistResult);

        return $mockedSomeRepository;
    }

}
