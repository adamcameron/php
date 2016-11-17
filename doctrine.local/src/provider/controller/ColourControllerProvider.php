<?php

namespace doctrineTest\provider\controller;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class ColourControllerProvider implements ControllerProviderInterface {

	public function connect(Application $app) {
		$controllers = $app["controllers_factory"];

		$controllers->get("/{id}", [$app["controller.colour"], "doGet"])
			->method("GET")
			->bind("route.colourById");
		return $controllers;
	}
}
