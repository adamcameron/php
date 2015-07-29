<?php
// class.php

require __DIR__ . "/../safeRun.php";

class Test {}
class NotTest {}

function returnsTest($test): Test {
	return $test;
}

safeRun("Calling returnsTest() with a Test object", function(){
	$test = new Test();
	returnsTest($test);
});

safeRun("Calling returnsTest() with a NotTest object", function(){
	$notTest = new NotTest();
	returnsTest($notTest);
});

safeRun("Calling returnsTest() with a null object", function(){
	returnsTest(null);
});
