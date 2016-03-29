<?php

namespace me\adamcameron\someapp\test\helper;

class MockHelperTest extends \PHPUnit_Framework_TestCase {

    private $mockHelper;

    public function setup(){
        $this->mockHelper = new MockHelper();
    }

    public function testNullConstructorArgs() {
        $mockedMockHelper = $this->mockHelper->mockObject(
            'me\adamcameron\someapp\test\helper\MockHelper',
            [
                "disableOriginalConstructor" => [
                    "expects" => $this->never()
                ],
                "setConstructorArgs" => [
                    "expects" => $this->once()
                ]
            ]
        );

        $mockedObject = $mockedMockHelper->mockObject(
            'me\adamcameron\someapp\test\helper\TestClass'
        );

        $this->assertInstanceOf('me\adamcameron\someapp\test\helper\TestClass', $mockedObject);
    }

}

class TestClass {

    function firstMethod(){

    }
}