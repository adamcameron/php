<?php
namespace dac;

echo 'BrokenSubClass' . PHP_EOL;

require_once DEPENDENCY_DIR . '/Dependency.php';

class BrokenSubClass extends BaseClass {

	public function __construct(){
	}

}