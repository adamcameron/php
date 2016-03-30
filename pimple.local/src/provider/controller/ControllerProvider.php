<?php

namespace me\adamcameron\pimpleBug\provider\controller;

use Silex;
use Silex\ControllerProviderInterface;

class ControllerProvider implements ControllerProviderInterface {

	public function connect(Silex\Application $app) {
		$controllers = $app["controllers_factory"];

		$controllers->get('', "controller.home:doGet")
			->method("GET")
			->bind("route.home");

		return $controllers;
	}

}
