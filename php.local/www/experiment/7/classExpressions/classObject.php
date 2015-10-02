<?php
// classObject.php

$c = class {
	private $x;

	function __construct($x){
		$this->x = $x;
	}

	function multiply($y){
		return $this->x * $y;
	}
};

$o = new $c(17);
$result = $o->multiply(19);

echo $result;
