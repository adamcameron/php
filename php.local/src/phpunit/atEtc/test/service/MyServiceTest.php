<?php

namespace atEtc\test\service;

use atEtc\service\MyService;

class MyServiceTest extends \PHPUnit_Framework_TestCase {

    private $mockedRepository;
    private $myService;

    public function setup()
    {
        $this->getMockedRepository();
        $this->getTestMyService();
    }

    public function testUsesAt()
    {
        $firstArg = 'FIRST_ARG';
        $secondArg = 'SECOND_ARG';
        $thirdArg = 'THIRD_ARG';
        $this->mockedRepository
            ->expects($this->at(0))
            ->method('testsAtFirstMethod')
            ->with($firstArg);
        $this->mockedRepository
            ->expects($this->at(1))
            ->method('testsAtSecondMethod')
            ->with($secondArg);
        $this->mockedRepository
            ->expects($this->at(2))
            ->method('testsAtSecondMethod')
            ->with($secondArg);
        $this->mockedRepository
            ->expects($this->at(3))
            ->method('testsAtFirstMethod')
            ->with($firstArg, $thirdArg);

        $this->myService->usesAt($firstArg, $secondArg, $thirdArg);
    }

    private function getMockedRepository()
    {
        $this->mockedRepository = $this->getMockBuilder('\atEtc\repository\MyRepository')
            ->setMethods(['testsAtFirstMethod','testsAtSecondMethod','testsAtThirdMethod'])
            ->getMock();
    }

    private function getTestMyService()
    {
        $this->myService = new MyService($this->mockedRepository);
    }

}