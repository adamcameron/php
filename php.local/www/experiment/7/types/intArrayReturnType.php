<?php
// intArrayReturnType.php

function returnsArrayOfInts($size): int[] {
	return array_map(function($v){
		return $v;
	}, range(1, $size));
}

$result = returnsArrayOfInts(5);
var_dump($result);