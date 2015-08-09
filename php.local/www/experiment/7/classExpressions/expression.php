<?php

echo (new class {
	function f($x){
		return $x ** 2;
	}
})->f(17);


