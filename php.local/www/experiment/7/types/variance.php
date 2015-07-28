<?php
// variance.php

require __DIR__ . "/safeRun.php";

interface SomeInterface {
	function returnsBaseClass() : BaseClass;
	function expectsBaseClass(BaseClass $baseClassInstance);
}

class BaseClass {}
class SubClass extends BaseClass {}

class SomeImplementation implements SomeInterface {
	function returnsBaseClass() : BaseClass {
		return new SubClass();
	}

	function expectsBaseClass(BaseClass $baseClassInstance){
		return $baseClassInstance;
	}

}

safeRun("Calling returnsBaseClass() with a SomeImplementation object", function(){
	$someObject = new SomeImplementation();
	$someSubClassObject = $someObject->returnsBaseClass();

	printf("Class of returned object: %s<br>", get_class($someSubClassObject));
});

