<?php
// arrayOfObjectArg.php

class Ruoloc {
    public $ruoloc;
    function __construct($ruoloc){
        $this->ruoloc = $ruoloc;
    }
}

class Colour {
    public $colour;
    function __construct($colour){
        $this->colour = $colour;
    }
}

function reverseRuolocs(array $ruolocs){
	return array_map(function($ruoloc){
        return new Colour(strrev($ruoloc->ruoloc));
    }, $ruolocs);
}

$wobniar = [new Ruoloc("orehw"), new Ruoloc("akarak"), new Ruoloc("iahwok"), new Ruoloc("ikirakak"), new Ruoloc("ignarokik"), new Ruoloc("ognaporop"), new Ruoloc("arupap")];
$rainbow = reverseRuolocs($wobniar);
var_dump($rainbow);
