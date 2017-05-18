<?php

namespace me\adamcameron\phpunit\test\callLog;

use me\adamcameron\phpunit\callLog\MyFlakyHelper;
use me\adamcameron\phpunit\callLog\MyLogger;
use me\adamcameron\phpunit\callLog\MyService;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase
{

    private $sut;
    private $logger;
    private $helper;

    function setup()
    {
        $this->mockDependencies();
        $this->sut = new MyService($this->logger, $this->helper);
    }

    function testMyMethodUsingAt()
    {
        $exceptionMessage = "EXPECT_THIS";
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage($exceptionMessage);

        $testIterations = 6;
        $errorAt = $testIterations / 2;

        $this->helper
            ->expects($this->at($errorAt))
            ->method("doThing")
            ->willThrowException(new \RuntimeException($exceptionMessage));

        $this->logger
             ->expects($this->at(7))
             ->method("logMessage")
             ->with("Starting processing iteration 4");
        $this->logger
             ->expects($this->at(8))
             ->method("logMessage")
             ->with("Something went wrong: $exceptionMessage");
        $this->logger
             ->expects($this->at(9))
             ->method("logMessage")
             ->with("All done");

        $this->sut->myMethod($testIterations);
    }

    function testMyMethodUsingCallLog()
    {
        $exceptionMessage = "EXPECT_THIS";
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage($exceptionMessage);

        $testIterations = 6;
        $errorAt = $testIterations / 2;

        $this->helper
            ->expects($this->at($errorAt))
            ->method("doThing")
            ->willThrowException(new \RuntimeException($exceptionMessage));

        $callLog = [];
        $this->logger
            ->method("logMessage")
            ->will($this->returnCallback(function ($message) use (&$callLog) {
                $callLog[] = $message;
            }));

        try {
            $this->sut->myMethod($testIterations);
        }
        catch (\Exception $e) {
            $this->assertSame("All done", array_pop($callLog));
            $this->assertSame("Something went wrong: $exceptionMessage", array_pop($callLog));
            $this->assertNotSame("Finishing off", array_pop($callLog));

            throw $e;
        }
    }

    private function mockDependencies()
    {
        $this->logger = $this->getMockBuilder(MyLogger::class)
            ->getMock();

        $this->helper = $this->getMockBuilder(MyFlakyHelper::class)
            ->getMock();
    }
}
