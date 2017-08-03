<?php

function f($x) : bool {
	if ($x) {
		return true;
	}
}

//f(1); // OK

//f(0); // PHP Fatal error:  Uncaught TypeError: Return value of f() must be of the type boolean, none returned

function g($x) : ?bool {
	if ($x) {
		echo "returning true";
		return true;
	}

	echo "returning null";
	return null;
}

g(1); // returning true
g(0); // returning null
