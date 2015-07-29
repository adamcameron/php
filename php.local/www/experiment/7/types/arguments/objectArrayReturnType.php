<?php
// objectArrayReturnType.php

class Test {}

function returnsArrayOfTests($size): Test[] {
	return array_map(function($v){
		return $v;
	}, range(1, $size));
}

$result = returnsArrayOfTests(5);
var_dump($result);