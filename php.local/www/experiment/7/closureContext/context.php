<?php
 //context.php

class A {
	private $v = "A OBJECT CONTEXT\n";
	private $closureToInject;

	function __construct($b){
		$this->b = $b;
		$this->injectClosure();
	}

	private function injectClosure(){
		$this->closureToInject = function(){
			return $this->v;
		};
		$this->b->injected = $this->closureToInject;
	}

	function callDirectly(){
		return ($this->b->injected)();
	}

	function callWithContext(){
		return $this->b->injected->call($this->b);
	}
}

class B {
	private $v = "B OBJECT CONTEXT\n";
	public $injected;
}


$b = new B();
$a = new A($b);

echo $a->callDirectly();
echo $a->callWithContext();
