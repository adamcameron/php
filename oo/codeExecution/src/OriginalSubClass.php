<?php
namespace dac;

echo __FILE__ . ' outside class definition' . PHP_EOL;

require_once DEPENDENCY_DIR . '/Dependency.php';

class BrokenSubClass extends BaseClass {

	public function __construct(){
        echo __FILE__ . ' constructor executed' . PHP_EOL;
	}

}
