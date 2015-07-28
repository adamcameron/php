<?php
// null.php

require __DIR__ . "/safeRun.php";

function returnNull(): int {
    return null;
}

safeRun("Calling expectsSomeInterface() with a SomeImplementation object", function(){
	$result = returnNull();
	echo "returnNull(): [$result]<br>";
});
