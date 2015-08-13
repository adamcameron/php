<?php

$o = new class("WHERO") {

    private $s;

    public function __construct($s){
        $this->s = $s;
    }
    public function toLower(){
        return strtolower($this->s);
    }
    public function toUpper(){
        return strtoupper($this->s);
    }
};

$red = $o->toLower();
echo $red;

$RED = [$o, 'toUpper']();
echo $RED;

class Red {
    const MAORI = "whero";
}

echo "Red"::MAORI;