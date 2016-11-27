<?php

namespace me\adamcameron\fizzBuzzChallenge;

class FizzBuzzSequence {

    private $length;

    public function __construct($length=null) {
        $this->length = $length;
    }

    public function getFizzBuzzSequence() {
        $i = 0;
        while (is_null($this->length) || $i < $this->length){
            $i++;
            yield FizzBuzzNumber::fromInteger(($i));
        }
    }

    public function __invoke()
    {
        return $this->getFizzBuzzSequence();
    }
}
