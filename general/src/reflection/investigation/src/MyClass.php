<?php

namespace me\adamcameron\reflection\investigation;

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
