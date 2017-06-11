<?php
// BrokenSubClass.php

namespace dac;

echo __FILE__ . ' outside class definition' . PHP_EOL;

class BrokenSubClass extends BaseClass {

	require_once DEPENDENCY_DIR . '/Dependency.php';

	public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
	}

}
