<?php

$numbers = [1,2,3,4,5];

$sum = array_reduce($numbers, function($sum, $number){
    return $sum + $number;
}, 0);

echo $sum;