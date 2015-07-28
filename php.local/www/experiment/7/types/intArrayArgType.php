<?php
// intArrayArgType.php

function takeArrayOfInts(int[] $ints) {
	return json_encode($ints);
}

$result = takeArrayOfInts([1,2,3,4,5]);
var_dump($result);