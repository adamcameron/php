<?php

class C {
	function f($x){
		return $x *= 2;
	}
}

$o = new C();
echo $o->f(17);

$mockedF = 'function($x){
	return $x ** 2;
}';


/*
$o2 = new class extends C {
	function f($x){
		return (function($x){
			return $x ** 2;
		})($x);
	}
};
*/

$code =
	<<<code
	\$o2 = new class extends C {
		function f(\$x){
			return ($mockedF)(\$x);
		}
	};
code;
eval($code);

echo $o2->f(17);