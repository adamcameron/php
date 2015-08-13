<?php

$o = new class {
	function f($x){
		return $x ** 2;
	}
};

echo $o->f(17);


