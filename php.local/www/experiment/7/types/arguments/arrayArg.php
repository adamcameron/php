<?php
// arrayArg.php

require __DIR__ . "/../safeRun.php";

function countArray(array $array){
	return count($array);
}

safeRun("Passing an array as an argument", function(){
    $rainbow = ["whero", "karaka", "kowhai", "kakariki", "kikorangi", "poropango", "papura"];
    $result = countArray($rainbow);
    echo "The rainbow has $result colours<br>";
});


safeRun("Passing a string as an argument", function(){
    countArray("Not an array");
});