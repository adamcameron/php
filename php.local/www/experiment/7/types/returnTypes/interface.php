<?php
// interface.php

require __DIR__ . "/../safeRun.php";

interface SomeInterface {}
class SomeImplementation implements SomeInterface {}

class NotSomeImplementation {}

function returnsSomeInterface($someImplementation): SomeInterface {
	return $someImplementation;
}

safeRun("Calling returnsSomeInterface() with a SomeImplementation object", function(){
	$someImplementation = new SomeImplementation();
	returnsSomeInterface($someImplementation);
});

safeRun("Calling returnsSomeInterface() with a NotSomeImplementation object", function(){
	$notSomeImplementation = new NotSomeImplementation();
	returnsSomeInterface($notSomeImplementation);
});
