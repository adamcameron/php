<?php

namespace me\adamcameron\mocking\test\service;

/**
 * @coversDefaultClass me\adamcameron\mocking\service\MyService

 */

class MyServiceTest extends \PHPUnit_Framework_TestCase {

    private $myService;

    function setup(){
        $mockedLogger = $this->getMockedLogger();
        $this->myService = $this->getTestMyService($mockedLogger);
    }

    /**
     * @covers doesStuff
     */
    function testDoesStuff(){
        $result = $this->myService->doesStuff("TEST VALUE");

        $this->assertSame("RESULT OF DOING STUFF ON MOCKED RESPONSE FROM DOESRISKYSTUFF", $result);
    }

    function getMockedLogger(){
        $mockedLogger = $this->getMockBuilder('\me\adamcameron\mocking\stub\StubbedLoggingService')
            ->setMethods(["logSomething"])
            ->getMock();

        $mockedLogger->expects($this->once())
            ->method("logSomething")
            ->with("MOCKED RESPONSE FROM DOESRISKYSTUFF");

        return $mockedLogger;
    }

    function getStubbedLogger(){
        $stubbedLogger = $this->getMockBuilder('\me\adamcameron\mocking\stub\StubbedLoggingService')
            ->disableOriginalConstructor()
            ->getMock();
        return $stubbedLogger;
    }

    function getTestMyService($logger){
        $partiallyMockedMyService = $this->getMockBuilder('\me\adamcameron\mocking\service\MyService')
            ->setConstructorArgs([$logger])
            ->setMethods(["doesRiskyStuff"])
            ->getMock();

        $partiallyMockedMyService->expects($this->once())
            ->method("doesRiskyStuff")
            ->with("PREPPED TEST VALUE")
            ->willReturn("MOCKED RESPONSE FROM DOESRISKYSTUFF");

        return $partiallyMockedMyService;
    }

}