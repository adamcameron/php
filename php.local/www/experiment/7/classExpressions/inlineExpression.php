<?php
// inlineExpression.php

echo (new class(17) {
	private $x;

	function __construct($x){
		$this->x = $x;
	}

	function multiply($y){
		return $this->x * $y;
	}
})->multiply(19);
