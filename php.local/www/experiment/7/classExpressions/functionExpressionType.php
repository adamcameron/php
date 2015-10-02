<?php
// functionExpressionType.php

function add($x, $y){
    return $x + $y;
}
$addFunctionName = 'add';

printf('is_callable(add): %d%s', is_callable($addFunctionName), PHP_EOL);
$multiply = function($x, $y){
    return $x * $y;
};
printf('is_callable($multiply): %d%s', is_callable($multiply), PHP_EOL);
