<?php

namespace doctrineTest\provider\service;

use doctrineTest\controller;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ControllerProvider implements ServiceProviderInterface {

	public function register(Container $pimple) {
		$pimple["controller.hello"] = function(){
			$helloController = new controller\HelloController();

			return $helloController;
		};
		$pimple["controller.pdo"] = function(){
			$pdoController = new controller\PdoController();

			return $pdoController;
		};
		$pimple["controller.colour"] = function(){
			$colourController = new controller\ColourController();

			return $colourController;
		};
	}
}