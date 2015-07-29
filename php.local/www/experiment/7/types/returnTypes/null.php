<?php
// null.php

require __DIR__ . "/../safeRun.php";

function returnsAnInt($i): int {
    return $i;
}

safeRun("See what happens if we return null on an int function", function(){
	$result = returnsAnInt(null);
	echo "returnsAnInt(null): [$result]<br>";
});
