<?php

$numbers = array("one"=>"tahi", "two"=>"rua", "three"=>"toru", "four"=>"wha");

foreach($numbers as $en=>$mi){
	//$mi = "element value changed";
	$numbers[$en] = "array value changed";
	printf("via array: %s%s", $numbers[$en], PHP_EOL);
	printf("via element: %s%s", $mi, PHP_EOL);
}

var_dump($numbers);
