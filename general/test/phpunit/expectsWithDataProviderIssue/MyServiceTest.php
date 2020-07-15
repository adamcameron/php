<?php

namespace me\adamcameron\general\test\phpunit\expectsWithDataProviderIssue;

use me\adamcameron\general\phpunit\expectsWithDataProviderIssue\MyDependency;
use me\adamcameron\general\phpunit\expectsWithDataProviderIssue\MyService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase
{

    /** @dataProvider provideTestCasesForMyMethodTests */
    public function testMyMethodViaDataProvider(MockObject $dependency)
    {
        $dependency
            ->expects($this->once())
            ->method('someMethod')
            ->willReturn("MOCKED VALUE");

        $service = new MyService($dependency);

        $result = $service->myMethod();

        $this->assertEquals("MOCKED VALUE", $result);
    }

    public function provideTestCasesForMyMethodTests(){
        return [
            'it should call someMethod once' => [
                'dependency' => $this->createMock(MyDependency::class)
            ]
        ];
    }

    public function testMyMethodViaInlineMock()
    {
        $dependency = $this->createMock(MyDependency::class);
        $dependency
            ->expects($this->exactly(10))
            ->method('someMethod')
            ->willReturn("MOCKED VALUE");

        $service = new MyService($dependency);

        $result = $service->myMethod();

        $this->assertEquals("MOCKED VALUE", $result);
    }

    /** @dataProvider provideTestCasesForMyOtherMethodTests */
    public function testMyOtherMethodCallsDependencyMethodEnoughTimesWithDependencyCreatedInDataProvider($dependency, $expectedCount) {
        $dependency
            ->expects($this->exactly($expectedCount))
            ->method('someOtherMethod')
            ->willReturn("MOCKED VALUE");

        $service = new MyService($dependency);

        $result = $service->myOtherMethod();

        $this->assertEquals("MOCKED VALUE", $result);
    }

    public function provideTestCasesForMyOtherMethodTests(){
        return [
            'it expects myOtherMethod to be called 3 times' => [
                'dependency' => $this->createMock(MyDependency::class),
                'expectedCount' => 3
            ],
            'it expects myOtherMethod to be called 4 times' => [
                'dependency' => $this->createMock(MyDependency::class),
                'expectedCount' => 4
            ],
            'it expects myOtherMethod to be called 5 times' => [
                'dependency' => $this->createMock(MyDependency::class),
                'expectedCount' => 5
            ],
            'it expects myOtherMethod to be called 6 times' => [
                'dependency' => $this->createMock(MyDependency::class),
                'expectedCount' => 6
            ],
            'it expects myOtherMethod to be called 7 times' => [
                'dependency' => $this->createMock(MyDependency::class),
                'expectedCount' => 7
            ]
        ];
    }

    /** @dataProvider provideTestCasesForMyOtherMethodTests */
    public function testMyOtherMethodCallsDependencyMethodEnoughTimesWithDependencyCreatedInTest($_, $expectedCount) {
        $dependency = $this->createMock(MyDependency::class);
        $dependency
            ->expects($this->exactly($expectedCount))
            ->method('someOtherMethod')
            ->willReturn("MOCKED VALUE");

        $service = new MyService($dependency);

        $result = $service->myOtherMethod();

        $this->assertEquals("MOCKED VALUE", $result);
    }
}
