<?php
// Dependency.php

namespace other;

echo __FILE__ . ' outside class definition' . PHP_EOL;

class Dependency {

    public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
    }

}
