<?php

namespace me\adamcameron\mocking\test\general;
use me\adamcameron\mocking\general\SubClass;

/**
 * @coversDefaultClass me\adamcameron\mocking\general\SubClass
 */

class SubClassTest extends \PHPUnit_Framework_TestCase {

    private $testSubClass;

    function setup(){
        $this->testSubClass = new SubClass();
    }

    function testf(){
        $this->testSubClass->f();
    }

}