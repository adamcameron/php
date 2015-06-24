<?php
// iifeExample.php

class Score {
    private $value;

    function __construct($value){
        $this->value = $value;
    }

    function getValue(){
        return $this->value;
    }
}

function getScores(){
    return $scores = array_map(function($x){return new Score($x);}, [97,2,47,73,29]);
}

$oldScoreSorter = function($e1, $e2){
    $e1Value = $e1->getValue();
    $e2Value = $e2->getValue();

    if ($e1Value == $e2Value) return 0;
    if ($e1Value > $e2Value) return 1;
    return -1;
};


$scores = getScores();
usort($scores, $oldScoreSorter);
echo '<h4>After (using old approach)</h4><pre>';
var_dump($scores);
echo '</pre>';


$comparatorUsingIife = function($e1, $e2){
    return (function($x){
        return (int) ($x / abs($x));
    })($e1->getValue() - $e2->getValue());
};

$scores = getScores();
usort($scores, $comparatorUsingIife);
echo '<h4>After (using new approach)</h4><pre>';
var_dump($scores);
echo '</pre>';

