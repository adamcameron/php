<?php

namespace me\adamcameron\tdd\test\controller;

use me\adamcameron\tdd\controller\HelloController;
use PHPUnit\Framework\TestCase;

/** @coversDefaultClass me\adamcameron\tdd\controller\HelloController */
class HelloControllerTest extends TestCase
{
    private $controller;

    public function setup()
    {
        $this->controller = new HelloController();
    }

    /** @covers ::doGet */
    public function testDoGet()
    {
        $name = "TEST";
        $expected = "G'day $name!";
        $result = $this->controller->doGet($name);

        $this->assertSame($expected, $result);
    }
}
