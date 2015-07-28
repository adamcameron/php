<?php
// subClass.php

require __DIR__ . "/safeRun.php";

class BaseClass {}
class SubClass extends BaseClass {}

class NotSubclass {}

function expectsBaseClass(BaseClass $subClass){
	return $subClass;
}

function returnsBaseClass($subClass): BaseClass {
	return $subClass;
}

safeRun("Calling expectsBaseClass() with a SubClass object", function(){
	$subClass = new SubClass();
	expectsBaseClass($subClass);
});

safeRun("Calling expectsBaseClass() with a NotSubClass object", function(){
	$notSubClass = new NotSubClass();
	expectsBaseClass($notSubClass);
});

safeRun("Calling returnsBaseClass() with a SubClass object", function(){
	$subClass = new SubClass();
	returnsBaseClass($subClass);
});

safeRun("Calling returnsBaseClass() with a NotSubClass object", function(){
	$notSubClass = new NotSubClass();
	returnsBaseClass($notSubClass);
});
