<?php

namespace spec\me\adamcameron\fizzBuzzChallenge;

use me\adamcameron\fizzBuzzChallenge\FizzBuzz;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzSpec extends ObjectBehavior {

    function its_class_IsInitializable() {
        $this->shouldHaveType(FizzBuzz::class);
    }

    function its_getFizzBuzzSequenceReturnsAGenerator() {
        $this->getFizzBuzzSequence()->shouldHaveType(\Generator::class);
    }

    function its_getFizzBuzzNumberReturnsAValue() {
        $this->getFizzBuzzNumber()->shouldMatch('/\d+|fizz|buzz|fizzbuzz/');
    }
}
