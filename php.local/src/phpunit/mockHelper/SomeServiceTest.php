<?php

class SomeServiceTest extends PHPUnit_test_case {

    private $someService;

	private $testId = "TEST_ID";
	private $testThing = "TEST_THING";

	private $mockedGetTheThingResult = "MOCKED_GETTHETHING_RESULT";
	private $mockedDoesTheThingExistResult = "MOCKED_DOESTHETHINGEXIST_RESULT";

	public function setup(){
        $mockedSomeRepository = $this->getMockedSomeRepository();
        $this->someService = new SomeService($mockedSomeRepository);
    }

	public function testGetTheThing(){
        $result = $this->someService->getTheThing($this->testId);

        $this->assertEquals($this->mockedGetTheThingResult, $result);
    }

	public function testSetTheThing(){
        $this->someService->setTheThing($this->testId, $this->testThing);
    }

	public function testDoesTheThingExist(){
        $result = $this->someService->doesTheThingExist($this->testId);
        $this->assertEquals($this->mockedDoesTheThingExistResult, $result);
    }

	private function getMockedSomeRepository(){
		$mockedSomeRepository = $this
			->getMockFactory('\me\adamcameron\someApp\repository\SomeRepository')
			->disableOriginalConstructor()
			->setMethods(["getTheThing", "setTheThing", "doesTheThingExist"])
			->getMock();

		$mockedSomeRepository
			->expects($this->once())
			->method("getTheThing")
			->with($this->testId)
			->willReturn($this->mockedGetTheThingResult);

		$mockedSomeRepository
			->expects($this->once())
			->method("setTheThing")
			->with($this->testId, $this->testThing);

		$mockedSomeRepository
			->expects($this->once())
			->method("doesTheThingExist")
			->with($this->testId)
			->willReturn($this->mockedDoesTheThingExistResult);

		return mockedSomeRepository;
	}

}
