<?php
// class.php

require __DIR__ . "/safeRun.php";

class Test {}
class NotTest {}

function expectsTest(Test $test){
	return $test;
}

function returnsTest($test): Test {
	return $test;
}

safeRun("Calling expectsTest() with a Test object", function(){
	$test = new Test();
	expectsTest($test);
});

safeRun("Calling expectsTest() with a NotTest object", function(){
	$notTest = new NotTest();
	expectsTest($notTest);
});

safeRun("Calling returnsTest() with a Test object", function(){
	$test = new Test();
	returnsTest($test);
});

safeRun("Calling returnsTest() with a NotTest object", function(){
	$notTest = new NotTest();
	returnsTest($notTest);
});
