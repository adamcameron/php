<?php

class UsesConfig{

    private $config;

    function __construct($config){
        $this->config = $config;
    }

    function getConfig(){
        return $this->config;
    }

}