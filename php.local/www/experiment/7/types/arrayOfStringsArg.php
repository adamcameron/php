<?php
// arrayOfStringsArg.php

function reverseArrayElements(string[] $strings){
	return array_map(function($string){
        return strrev($string);
    }, $strings);
}

$wobniar = ["orehw","akarak" ,"iahwok", "ikirakak","ignarokik","ognaporop", "arupap"];    $rainbow = ["whero", "karaka", "kowhai", "kakariki", "kikorangi", "poropango", "papura"];
$rainbow = reverseArrayElements($wobniar);
var_dump($rainbow);
