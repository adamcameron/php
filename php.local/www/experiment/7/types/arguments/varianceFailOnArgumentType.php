<?php
// varianceFailOnArgumentType.php

interface SomeInterface {
	function expectsBaseClass(BaseClass $someImplementation);
}

class BaseClass {}
class SubClass extends BaseClass {}

class someImplementation implements SomeInterface {
	function expectsBaseClass(SubClass $someImplementation)  {
		return $someImplementation;
	}
}
