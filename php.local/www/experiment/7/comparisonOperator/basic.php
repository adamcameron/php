<?php
// basic.php

function compareSets($sets, $heading=''){
    echo "<h2>$heading</h2>";
    echo '<pre>';
    foreach($sets as $set){
        foreach($set as $op1){
            foreach($set as $op2){
                printf('%s <=> %s = %d<br>', json_encode($op1), json_encode($op2), $op1 <=> $op2);
            }
        }
        echo '<hr>';
    }
    echo '</pre>';
}


// simples
$strings = ['mmm', 'nnn'];
$integers = [17, 19];
$floats = [M_E, pi()];
$booleans = [false,true];

$simple = [$strings, $integers, $floats, $booleans];
compareSets($simple, 'Simple values');


// arrays
$empty = [];
$short = [2];
$sequence = [1,2,4];
$order = [1,4,2];
$value = [4,1,1];

$emptyCheck = [$empty, $short];
$lengthVsFirst = [$short, $sequence];
$sameLengthDiffOrder = [$sequence, $order];
$sameLengthHigherValueFirst = [$sequence, $value];

$arrays = [$emptyCheck, $lengthVsFirst, $sameLengthDiffOrder ,$sameLengthHigherValueFirst];

compareSets($arrays, 'Arrays');


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

$sameClass = [$low, $high];
$differentClasses = [$c, $d];

$objects = [$sameClass, $differentClasses];
compareSets($objects, 'Objects');