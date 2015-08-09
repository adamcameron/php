<?php

$object =
<<<'code'
$o = new class {
	function f($x){
		return $x ** 2;
	}
};
code;
eval($object);

echo $o->f(17);