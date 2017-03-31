<?php

namespace me\adamcameron\typeChecking;

interface I {

	function f($x);

}

class C implements I {

	function f($x){
		return "f: $x";
	}

	function g($x){
		return "g: $x";
	}
}

class D {

	function f(I $o, $x){
		return $o->f($x);
	}

	function g(I $o, $x){
		return $o->g($x);
	}
}

$c = new C();

echo $c->f(41) . PHP_EOL;
echo $c->g(43) . PHP_EOL;
echo PHP_EOL;

$d = new D();
echo $d->f($c, 47) . PHP_EOL;
echo $d->g($c, 53) . PHP_EOL;
echo PHP_EOL;