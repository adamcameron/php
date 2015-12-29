<?php

namespace other;

echo __FILE__ . ' read' . PHP_EOL;

class Dependency {

    public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
    }

}
