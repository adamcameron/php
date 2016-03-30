<?php

namespace me\adamcameron\pimpleBug\provider\service;

use Silex;
use me\adamcameron\pimpleBug\controller;

class ControllerServiceProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {

		$app["controller.home"] = $app->share(function() {
			return new controller\HomeController();
		});

	}

}
