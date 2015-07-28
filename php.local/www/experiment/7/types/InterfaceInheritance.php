<?php
// interfaceInheritance.php

require __DIR__ . "/safeRun.php";

interface SomeBaseInterface {}
interface SomeSubInterface extends SomeBaseInterface {}
class SomeImplementation implements SomeSubInterface {}

class NotSomeImplementation {}

function expectsSomeBaseInterface(SomeBaseInterface $someImplementation){
	return $someImplementation;
}

function returnsSomeBaseInterface($someImplementation): SomeBaseInterface {
	return $someImplementation;
}

safeRun("Calling expectsSomeBaseInterface() with a SomeImplementation object", function(){
	$someImplementation = new SomeImplementation();
	expectsSomeBaseInterface($someImplementation);
});

safeRun("Calling expectsSomeBaseInterface() with a NotSomeImplementation object", function(){
	$notSomeImplementation = new NotSomeImplementation();
	expectsSomeBaseInterface($notSomeImplementation);
});

safeRun("Calling returnsSomeBaseInterface() with a SomeImplementation object", function(){
	$someImplementation = new SomeImplementation();
	returnsSomeBaseInterface($someImplementation);
});

safeRun("Calling returnsSomeBaseInterface() with a NotSomeImplementation object", function(){
	$notSomeImplementation = new NotSomeImplementation();
	returnsSomeBaseInterface($notSomeImplementation);
});
