<?php
// intReturnType.php

require __DIR__ . "/../safeRun.php";

function echoInt($x): int {
    return $x;
}

safeRun("Baseline: returning an int", function(){
	$testValue = 42;
	$result = echoInt($testValue);
	echo "echoInt($testValue): [$result]<br>";
});

safeRun("returning a string", function(){
	$testValue = "wha-tekau rua";
	$result = echoInt($testValue);
	echo "echoInt($testValue): [$result]<br>";
});
