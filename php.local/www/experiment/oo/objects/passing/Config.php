<?php

class Config {

    private $allowCache;

    function __construct($allowCache){
        $this->allowCache = $allowCache;
    }

    function setAllowCache($allowCache){
        $this->allowCache = $allowCache;
    }

}