<?php
// interface.php

require __DIR__ . "/safeRun.php";

interface SomeInterface {}
class SomeImplementation implements SomeInterface {}

class NotSomeImplementation {}

function expectsSomeInterface(SomeInterface $someImplementation){
	return $someImplementation;
}

function returnsSomeInterface($someImplementation): SomeInterface {
	return $someImplementation;
}

safeRun("Calling expectsSomeInterface() with a SomeImplementation object", function(){
	$someImplementation = new SomeImplementation();
	expectsSomeInterface($someImplementation);
});

safeRun("Calling expectsSomeInterface() with a NotSomeImplementation object", function(){
	$notSomeImplementation = new NotSomeImplementation();
	expectsSomeInterface($notSomeImplementation);
});

safeRun("Calling returnsSomeInterface() with a SomeImplementation object", function(){
	$someImplementation = new SomeImplementation();
	returnsSomeInterface($someImplementation);
});

safeRun("Calling returnsSomeInterface() with a NotSomeImplementation object", function(){
	$notSomeImplementation = new NotSomeImplementation();
	returnsSomeInterface($notSomeImplementation);
});
