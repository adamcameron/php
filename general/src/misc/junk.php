<?php

class A {
	function a(){
		echo "eh?";
	}
}

class B {
	function b(){
		echo "be";
	}
}

class C {

	/**
	 * @param bool $b
	 * @return A|B
	 */
	function f($b){
		if ($b) {
			return new A();
		}else {
			return new B();
		}
	}
}

$c = new C();

$o = $c->f(1);












$o->

