<?php

namespace me\adamcameron\someapp\test\service {

    use \me\adamcameron\someapp\service\SomeService;

    class SomeServiceTest extends \PHPUnit_Framework_TestCase
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
                ->getMockBuilder('\me\adamcameron\someapp\repository\SomeRepository')
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
}
