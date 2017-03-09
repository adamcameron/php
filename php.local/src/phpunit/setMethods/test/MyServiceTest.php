<?php

namespace me\adamcameron\myApp\test;

use me\adamcameron\myApp\MyDependency;
use me\adamcameron\myApp\MyService;

class MyServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testWithExplicitMock()
    {
        $dependency = $this
            ->getMockBuilder(MyDependency::class)
            ->setMethods(['decorate'])
            ->getMock();

        $dependency
            ->method('decorate')
            ->willReturn('MOCKED DECORATION');

        $service = new MyService($dependency);

        $result = $service->testMe('TEST MESSAGE');

        $this->assertSame(
            '(PREFIX ADDED BY METHOD) MOCKED DECORATION',
            $result
        );
    }

    public function testWithImplicitMock()
    {
        $dependency = $this
            ->getMockBuilder(MyDependency::class)
            ->setMethods([])
            ->getMock();

        $dependency
            ->method('decorate')
            ->willReturn('MOCKED DECORATION');

        $service = new MyService($dependency);

        $result = $service->testMe('TEST MESSAGE');

        $this->assertSame(
            '(PREFIX ADDED BY METHOD) MOCKED DECORATION',
            $result
        );
    }

    public function testWithNull()
    {
        $dependency = $this
            ->getMockBuilder(MyDependency::class)
            ->setMethods(null)
            ->getMock();

        $dependency
            ->method('decorate')
            ->willReturn('MOCKED DECORATION');

        $service = new MyService($dependency);

        $result = $service->testMe('TEST MESSAGE');

        $this->assertSame(
            '(PREFIX ADDED BY METHOD) THE ACTUAL MESSAGE IS: TEST MESSAGE',
            $result
        );
    }

    public function testWithoutSetMethods()
    {
        $dependency = $this
            ->getMockBuilder(MyDependency::class)
            ->getMock();

        $dependency
            ->method('decorate')
            ->willReturn('MOCKED DECORATION');

        $service = new MyService($dependency);

        $result = $service->testMe('TEST MESSAGE');

        $this->assertSame(
            '(PREFIX ADDED BY METHOD) MOCKED DECORATION',
            $result
        );
    }
}
