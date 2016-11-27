<?php

require __DIR__ . '\..\vendor\autoload.php';

use \me\adamcameron\fizzBuzzChallenge\FizzBuzzSequence;

$fizzBuzzSequence = new FizzBuzzSequence();
$seq = $fizzBuzzSequence();

foreach(range(1,120) as $i) {
    echo "$i: " . $seq->current() . PHP_EOL;
    echo $seq->next();
}
