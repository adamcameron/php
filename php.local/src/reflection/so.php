<?php

namespace me\adamcameron\test;

class MyClass{

	public $myProperty;

	function __construct($myProperty){
		$this->myProperty = $myProperty;
	}
	
	function myMethod($myArg){
		return (object) [
			'myProperty' => $this->myProperty,
			'myArg' => $myArg
		];
	}
}

$namespace = '\me\adamcameron\test';
$className = 'MyClass';
$classPath = "$namespace\\$className";

$reflectedMyClass = new \ReflectionClass($classPath);
$myObj = $reflectedMyClass->newInstance('myPropertyValue');

$method = 'myMethod';
$result = $reflectedMyClass->getMethod($method)->invoke($myObj, 'myArgValue');

print_r($result);