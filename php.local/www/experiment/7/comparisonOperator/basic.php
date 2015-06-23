<?php
// basic.php

function compareSets($sets, $handler, $heading=''){
    echo "<h2>$heading</h2>";
    echo '<pre>';
    foreach($sets as $set){
        foreach($set as $op1){
            foreach($set as $op2){
                printf('%s <=> %s = %d<br>', $handler($op1), $handler($op2), $op1 <=> $op2);
            }
        }
        echo '<hr>';
    }
    echo '</pre>';
}

$simpleHandler = function ($x){
    return $x;
};

$complexHandler = function ($x){
    return json_encode($x);
};


// simples
$strings = ['mmm', 'nnn'];
$integers = [17, 19];
$floats = [M_E, pi()];

$simple = [$strings, $integers, $floats];
compareSets($simple, $simpleHandler, 'Simple values');


// arrays
$empty = [];
$short = [2];
$sequence = [1,2,4];
$order = [1,4,2];
$value = [4,1,1];

$emptyCheck = [$empty, $short];
$lengthVsFirst = [$short,$sequence];
$sameLengthDiffOrder = [$sequence,$order];
$sameLengthDiffOrder = [$sequence,$value];

$arrays = [$emptyCheck,$lengthVsFirst,$sameLengthDiffOrder,$sameLengthDiffOrder];

compareSets($arrays, $complexHandler, 'Arrays');


// objects
class C {
    public $p;
    function __construct($p){
        $this->p = $p;
    }
}
class D {
    public $p;
    function __construct($p){
        $this->p = $p;
    }
}

$low = new C('a');
$high = new C('z');

$c = new C('instance of C');
$d = new D('instance of D');

$objects = [[$low, $high], [$c, $d]];
compareSets($objects, $complexHandler, 'Objects');