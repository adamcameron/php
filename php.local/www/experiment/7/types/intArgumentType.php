<?php
// intArgumentType.php

require __DIR__ . "/safeRun.php";

function squareIt(int $x) {
	return $x ** 2;
}

try {safeRun("Passing an int to a function expecting an int", function(){
	$arg = 42;
	$result = squareIt($arg);
	echo "Function returned $result<br>";
});

try {safeRun("Passing a string to a function expecting an int", function(){
	$arg = "hi";
	$result = squareIt($arg);
	echo "Function returned $result<br>";
});