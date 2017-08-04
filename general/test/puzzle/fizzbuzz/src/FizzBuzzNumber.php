<?php

namespace me\adamcameron\fizzBuzzChallenge;

class FizzBuzzNumber {

    private $value;

    function __construct($value) {
        if (!preg_match('/\d+|fizz|buzz|fizzbuzz/', $value)) {
            throw new \InvalidArgumentException("$value is not a valid FizzBuzzNumber");
        }
        if (is_integer($value) && !($value % 3 && $value % 5)){
            throw new \InvalidArgumentException("$value is not a valid FizzBuzzNumber");
        }

        $this->value = $value;
    }

    static function fromInteger($i) : FizzBuzzNumber {
        $result = "";

        if ($i % 3 == 0) {
            $result .= "fizz";
        }
        if ($i % 5 == 0) {
            $result .= "buzz";
        }
        if (empty($result)) {
            $result = $i;
        }

        return new self($result);
    }

    function __toString() {
        return (string) $this->value;
    }
}
