<?php

namespace me\adamcameron\general\reflection;

interface SomeBehaviour {
	function myMethod(string $myArg) : \stdClass;
}

class MyBaseClass {
	
}

trait MyTrait {
	
	public function myTraitMethod($myArg){
		return (array) $this->myMethod($myArg);
	}
	
	abstract public function myMethod(string $myArg);
}

/** annotation on class */
class MyClass extends MyBaseClass implements SomeBehaviour {

	use MyTrait {
		myTraitMethod as myImportedBehaviour;
	}

	const AttUQoLTUaE = 42;

	public $myPublicProperty = 'myPublicProperty value';
	private $myPrivateProperty = 'myPrivateProperty value';
	protected $myProtectedProperty = 'myProtectedProperty value';

	public static $myPublicStaticProperty = 'myPublicStaticProperty value';
	private static $myPrivateStaticProperty = 'myPrivateStaticProperty value';
	protected static $myProtectedStaticProperty = 'myProtectedStaticProperty value';
	
	
	function __construct($myProperty){
		$this->myProperty = $myProperty;
	}
	
	function myMethod(string $myArg) : \stdClass{
		return (object) [
			'myProperty' => $this->myProperty,
			'myArg' => $myArg
		];
	}
}

$namespace = '\me\adamcameron\reflectionTest';
$className = 'MyClass';
$classPath = "$namespace\\$className";

$reflectedMyClass = new \ReflectionClass($classPath);
$myObj = $reflectedMyClass->newInstance('myPropertyValue');

$method = 'myMethod';
$result = $reflectedMyClass->getMethod($method)->invoke($myObj, 'myArgValue');

print_r($result);


$myObj = new MyClass('myPropertyValue');
$myArray = $myObj->myImportedBehaviour('value to return in the array');
print_r($myArray);
