<?php

namespace me\adamcameron\phpunit\test\atEtc\service;

use me\adamcameron\phpunit\atEtc\repository\MyRepository;
use me\adamcameron\phpunit\atEtc\service\MyService;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase {

    private $mockedRepository;
    private $myService;
    private $firstArg = 'FIRST_ARG';
    private $secondArg = 'SECOND_ARG';
    private $thirdArg = 'THIRD_ARG';

    public function setup()
    {
        $this->getMockedRepository();
        $this->getTestMyService();
    }

    public function testUsesAt()
    {
        $this->mockedRepository
            ->expects($this->at(0))
            ->method('testsAtFirstMethod')
            ->with($this->firstArg);
        $this->mockedRepository
            ->expects($this->at(1))
            ->method('testsAtSecondMethod')
            ->with($this->secondArg);
        $this->mockedRepository
            ->expects($this->at(2))
            ->method('testsAtSecondMethod')
            ->with($this->secondArg);
        $this->mockedRepository
            ->expects($this->at(3))
            ->method('testsAtFirstMethod')
            ->with($this->firstArg, $this->thirdArg);

        $this->myService->usesAt($this->firstArg, $this->secondArg, $this->thirdArg);
    }

    public function testUsesAtFail()
    {
        $this->expectException(\Exception::class);

        $this->mockedRepository
            ->expects($this->at(0))
            ->method('testsAtFirstMethod')
            ->with('INVALID_VALUE');

        $this->myService->usesAt($this->firstArg, $this->secondArg, $this->thirdArg);
    }

    public function testUsesWithConsecutive()
    {
        $this->mockedRepository
            ->method('testsWithConsecutive')
            ->withConsecutive([$this->firstArg, $this->secondArg, $this->thirdArg]);
    }

    private function getMockedRepository()
    {
        $this->mockedRepository = $this
            ->getMockBuilder(MyRepository::class)
            ->getMock();
    }

    private function getTestMyService()
    {
        $this->myService = new MyService($this->mockedRepository);
    }

}