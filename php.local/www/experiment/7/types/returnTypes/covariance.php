<?php
// covariance.php

require __DIR__ . "/../safeRun.php";

class Base {
}

class Sub extends Base {
}

interface BaseInterface {
	function returnsOneOfItsOwn($obj) : Base;
}

class TestBase implements BaseInterface {
	function returnsOneOfItsOwn($obj) : Base {
		return $obj;
	}
}

class TestSub extends TestBase {
	function returnsOneOfItsOwn($obj) : Sub {
		return $obj;
	}
}

/*
safeRun("Baseline: TestBase", function() use ($test) {
	$test = new TestBase();
	$base = new Base();
	$test->returnsOneOfItsOwn($base);
});

safeRun("Passing a Sub", function() use ($test) {
	$test = new TestSub();
	$sub = new Sub();
	$test->returnsOneOfItsOwn($sub);
});
*/