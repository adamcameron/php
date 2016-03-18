<?php
namespace me\adamcameron\decorator\provider\service;

use Silex;
use me\adamcameron\decorator\controller;

class ControllerServiceProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {
		$app["controller.home"] = $app->share(function() {
			return new controller\HomeController();
		});
	}

}
