<?php

namespace me\adamcameron\mocking\test\service;
use me\adamcameron\mocking\service\MyService;
use me\adamcameron\mocking\test\helper\ReflectionHelper;

/**
 * @coversDefaultClass me\adamcameron\mocking\service\MyService

 */

class MyServiceTest extends \PHPUnit_Framework_TestCase {

    private $myService;

    function setup(){
        $this->myService = $this->getTestMyService();
    }

    /**
     * @covers doesStuff
     */
    function testDoesStuff(){
        $result = $this->myService->doesStuff("TEST VALUE");

        $this->assertSame("RESULT OF DOING STUFF ON MOCKED RESPONSE FROM DOESRISKYSTUFF", $result);
    }

private function getTestMyService(){
    $partiallyMockedMyService = $this->getPartiallyMockedMyService();
    $partiallyMockedMyService = $this->stubOutLogger($partiallyMockedMyService);

    return $partiallyMockedMyService;
}

    private function getPartiallyMockedMyService(){
        $mockedLogger = $this->getMockedLogger();

        $partiallyMockedMyService = $this->getMockBuilder('\me\adamcameron\mocking\service\MyService')
            ->setConstructorArgs([$mockedLogger])
            ->setMethods(["doesRiskyStuff"])
            ->getMock();
        $partiallyMockedMyService->expects($this->once())
            ->method("doesRiskyStuff")
            ->with("PREPPED TEST VALUE")
            ->willReturn("MOCKED RESPONSE FROM DOESRISKYSTUFF");
        return $partiallyMockedMyService;
    }

    private function getMockedLogger(){
        $stubbedLogger = $this->getMockBuilder('\me\adamcameron\mocking\service\LoggingService')
            ->disableOriginalConstructor()
            ->getMock();
        return $stubbedLogger;
    }

    private function stubOutLogger($myService){
        $stubbedLogger = $this->getStubbedLogger();
        ReflectionHelper::setPrivateProperty(
            '\me\adamcameron\mocking\service\MyService',
            $myService,
            'logger',
            $stubbedLogger
        );
        return $myService;
    }

    private function getStubbedLogger(){
        $mockedLogger = $this->getMockBuilder('\me\adamcameron\mocking\stub\StubbedLoggingService')
            ->setMethods(["logSomething"])
            ->getMock();

        $mockedLogger->expects($this->once())
            ->method("logSomething")
            ->with("MOCKED RESPONSE FROM DOESRISKYSTUFF");

        return $mockedLogger;
    }

}