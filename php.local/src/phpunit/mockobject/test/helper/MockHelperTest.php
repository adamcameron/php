<?php

namespace me\adamcameron\someapp\test\helper;

class MockHelperTest extends \PHPUnit_Framework_TestCase {

    private $mockHelper;

    public function setup(){
        $this->mockHelper = new MockHelper();
    }

    public function testMockMethod()
    {
    }

}