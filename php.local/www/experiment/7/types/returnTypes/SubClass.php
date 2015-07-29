<?php
// subClass.php

require __DIR__ . "/../safeRun.php";

class BaseClass {}
class SubClass extends BaseClass {}

class NotSubclass {}

function returnsBaseClass($subClass): BaseClass {
	return $subClass;
}

safeRun("Calling returnsBaseClass() with a SubClass object", function(){
	$subClass = new SubClass();
	returnsBaseClass($subClass);
});

safeRun("Calling returnsBaseClass() with a NotSubClass object", function(){
	$notSubClass = new NotSubClass();
	returnsBaseClass($notSubClass);
});
