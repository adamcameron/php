<?php

namespace me\adamcameron\phpunit\test\setMethods;

use me\adamcameron\phpunit\setMethods\MyDecorator;
use me\adamcameron\phpunit\setMethods\MyService;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase
{
    public function testWithExplicitMocks()
    {
        $decorator = $this
            ->getMockBuilder(MyDecorator::class)
            ->getMock();

        $decorator
            ->method('addPrefix')
            ->willReturn('(MOCKED PREFIX)');

        $decorator
            ->method('addSuffix')
            ->willReturn('(MOCKED SUFFIX)');

        $service = new MyService($decorator);

        $result = $service->decorateMessage('TEST MESSAGE');

        $this->assertSame(
            '(MOCKED SUFFIX)',
            $result
        );
    }

    public function testWithOneExplicitMock()
    {
        $decorator = $this
            ->getMockBuilder(MyDecorator::class)
            ->getMock();

        $decorator
            ->method('addPrefix')
            ->willReturn('(MOCKED PREFIX)');

        $service = new MyService($decorator);

        $result = $service->decorateMessage('TEST MESSAGE');

        $this->assertSame(
            '(MOCKED PREFIX) (ACTUAL SUFFIX)',
            $result
        );
    }

    public function testWithImplicitMocks()
    {
        $decorator = $this
            ->getMockBuilder(MyDecorator::class)
            ->setMethods([])
            ->getMock();

        $decorator
            ->method('addPrefix')
            ->willReturn('(MOCKED PREFIX)');

        $decorator
            ->method('addSuffix')
            ->willReturn('(MOCKED SUFFIX)');

        $service = new MyService($decorator);

        $result = $service->decorateMessage('TEST MESSAGE');

        $this->assertSame(
            '(MOCKED SUFFIX)',
            $result
        );
    }

    public function testWithNull()
    {
        $decorator = $this
            ->getMockBuilder(MyDecorator::class)
            //->setMethods(null)
            ->getMock();

        $decorator
            ->method('addPrefix')
            ->willReturn('(MOCKED PREFIX)');

        $decorator
            ->method('addSuffix')
            ->willReturn('(MOCKED SUFFIX)');

        $service = new MyService($decorator);

        $result = $service->decorateMessage('TEST MESSAGE');

        $this->assertSame(
            '(ACTUAL PREFIX) TEST MESSAGE (ACTUAL SUFFIX)',
            $result
        );
    }

    public function testWithoutSetMethods()
    {
        $decorator = $this
            ->getMockBuilder(MyDecorator::class)
            ->getMock();

        $decorator
            ->method('addPrefix')
            ->willReturn('(MOCKED PREFIX)');

        $decorator
            ->method('addSuffix')
            ->willReturn('(MOCKED SUFFIX)');

        $service = new MyService($decorator);

        $result = $service->decorateMessage('TEST MESSAGE');

        $this->assertSame(
            '(MOCKED SUFFIX)',
            $result
        );
    }
}
