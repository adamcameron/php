<?php

namespace spec\me\adamcameron\fizzBuzzChallenge;

use me\adamcameron\fizzBuzzChallenge\FizzBuzzNumber;
use me\adamcameron\fizzBuzzChallenge\FizzBuzzSequence;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzSequenceSpec extends ObjectBehavior {

    function its_class_IsInitializable() {
        $this->shouldHaveType(FizzBuzzSequence::class);
    }

    function it_returnsaGeneratorfromGetFizzBuzzSequence() {
        $this->getFizzBuzzSequence()->shouldHaveType(\Generator::class);
    }

    function it_fulfilsTheRequirement(){
        $lengthToTest = 100;
        $this->beConstructedWith($lengthToTest);

        $expected = array_map(function($i){
            return FizzBuzzNumber::fromInteger($i);
        },range(1, $lengthToTest));

        $this->getFizzBuzzSequence()->shouldIterateAs($expected);
    }

    function its_invokeMethodReturnsTheGenerator(){
        $this->__invoke()->shouldHaveType(\Generator::class);
    }
}
