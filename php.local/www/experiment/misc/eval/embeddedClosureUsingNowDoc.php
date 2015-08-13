<?php
$i = 17;

$doubler = function($x){
	return $x * 2;
};

$code = <<<'code'
$result = $doubler($i);
code;

eval($code);
echo $result;
