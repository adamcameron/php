<?php

namespace me\adamcameron\reflection\privateMethods\usingPhpUnit;

/**
 * @coversDefaultClass \me\adamcameron\reflection\privateMethods\usingPhpUnit\GreetingService
 */
class GreetingServiceTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers ::greet
     * @dataProvider provideCasesForGreetTests
     */
    public function testGreet($testName, $expectedResult){
        $greetingService = $this->getTestGreetingService($testName, $expectedResult);

        $actualGreeting = $greetingService->greet($testName);

        $this->assertSame($expectedResult, $actualGreeting);
    }

    public function provideCasesForGreetTests(){
        return [
            "basic case" => ["testName"=>"Zachary", "expectedResult"=>"MOCKED_APPLY_GREETING_RESULT"]
        ];
    }

    private function getTestGreetingService($testName, $expectedResult){
        $methodsToMock = [
            "applyGreeting" => [
                "with" => [$testName],
                "willReturn" => $expectedResult
            ]
        ];
        $testGreetingService = MockingHelper::getMockedObject(
            $this,
            '\me\adamcameron\reflection\privateMethods\usingPhpUnit\GreetingService',
            $methodsToMock,
            []
        );

        return $testGreetingService;
    }

}