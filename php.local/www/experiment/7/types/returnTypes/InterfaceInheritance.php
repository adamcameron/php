<?php
// interfaceInheritance.php

require __DIR__ . "/../safeRun.php";

interface SomeBaseInterface {}
interface SomeSubInterface extends SomeBaseInterface {}
class SomeImplementation implements SomeSubInterface {}

class NotSomeImplementation {}

function returnsSomeBaseInterface($someImplementation): SomeBaseInterface {
	return $someImplementation;
}

safeRun("Calling returnsSomeBaseInterface() with a SomeImplementation object", function(){
	$someImplementation = new SomeImplementation();
	returnsSomeBaseInterface($someImplementation);
});

safeRun("Calling returnsSomeBaseInterface() with a NotSomeImplementation object", function(){
	$notSomeImplementation = new NotSomeImplementation();
	returnsSomeBaseInterface($notSomeImplementation);
});
