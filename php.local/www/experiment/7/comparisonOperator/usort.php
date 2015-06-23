<?php
// usort.php

class Score {
    private $value;

    function __construct($value){
        $this->value = $value;
    }

    function getValue(){
        return $this->value;
    }
}

$scores = array_map(function($x){return new Score($x);}, [97,2,47,73,29]);


$oldScoreSorter = function($e1, $e2){
    return (function($x){
        return (int) ($x / abs($x));
    })($e1->getValue() - $e2->getValue());
};


$newScoreSorter = function($e1, $e2){
    return $e1->getValue() <=> $e2->getValue();
};

$scoresForOldSort = $scores;
$scoresForNewSort = $scores;

usort($scoresForOldSort, $oldScoreSorter);
echo '<pre>';
var_dump($scoresForOldSort, $scoresForNewSort);
echo '</pre>';



usort($scoresForNewSort, $newScoreSorter);
echo '<pre>';
new \dBug([$scoresForOldSort, $scores]);
echo '</pre>';


