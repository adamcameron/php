<?php

namespace me\adamcameron\reflection\privateMethods\usingOnlyReflection;

/**
 * @coversDefaultClass \me\adamcameron\reflection\privateMethods\usingOnlyReflection\GreetingService
 */
class GreetingServiceTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers ::greet
     * @dataProvider provideCasesForGreetTests
     */
    public function testGreet($testName, $expectedResult){
        $greetingService = $this->getTestGreetingService2($testName, $expectedResult);

        $actualGreeting = $greetingService->greet($testName);

        $this->assertSame($expectedResult, $actualGreeting);
    }

    public function provideCasesForGreetTests(){
        return [
            "basic case" => ["testName"=>"Zachary", "expectedResult"=>"MOCKED_APPLY_GREETING_RESULT"]
        ];
    }

    private function getTestGreetingService($testName, $expectedResult){
        $testGreetingService = $this->getMockBuilder('\me\adamcameron\reflection\privateMethods\GreetingService')
            ->setMethods(["applyGreeting"])
            ->getMock();

        $testGreetingService->expects($this->once())
            ->method("applyGreeting")
            ->with($testName)
            ->willReturn($expectedResult);

        return $testGreetingService;
    }

    private function getTestGreetingService2($testName, $expectedResult){
        $testGreetingService = $this->getMockBuilder('\me\adamcameron\reflection\privateMethods\GreetingService')
            ->setMethods(["__call"])
            ->getMock();

        $testGreetingService
            ->method("__call")
            //->with("applyGreeting", [$testName])
            ->willReturn($expectedResult);

        return $testGreetingService;
    }

}