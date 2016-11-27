<?php

require __DIR__ . '\..\vendor\autoload.php';

use \me\adamcameron\fizzBuzzChallenge\FizzBuzzSequence;

$seq = new FizzBuzzSequence(100);

foreach ($seq() as $fizzBuzzNumber) {
    echo $fizzBuzzNumber . PHP_EOL;
}
