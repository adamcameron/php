<?php
// inline.php

$o = new class(17) {
	private $x;

	function __construct($x){
		$this->x = $x;
	}

	function multiply($y){
		return $this->x * $y;
	}
};
$result = $o->multiply(19);

echo $result;
