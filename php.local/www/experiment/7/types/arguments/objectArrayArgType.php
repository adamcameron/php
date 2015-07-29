<?php
// objectArrayArgType.php

class Test {}

function takeArrayOfTests(Test[] $tests) {
	return json_encode($tests);
}

$tests = array_map(function(){
	return new Test();
}, range(1, 5));

$result = takeArrayOfTests($tests);
var_dump($result);