<?php

namespace dac;

echo __FILE__ . ' read' . PHP_EOL;

require_once __DIR__ . '/appConfig.php';

class BaseClass {

    public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
    }


}
