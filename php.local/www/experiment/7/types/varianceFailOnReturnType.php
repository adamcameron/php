<?php
// varianceFailOnReturnType.php

interface SomeInterface {
	function f() : BaseClass;
}

class BaseClass {}
class SubClass extends BaseClass {}

class someImplementation implements SomeInterface {
	function f() : SubClass {
		return new SubClass();
	}
}
