<?php

namespace me\adamcameron\pimpleBug\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController {

	public static function doGet(Request $request, Application $app) {

		var_dump($app["service.viaInline.my"]);

		try {
			var_dump($app["service.viaInline.my"]);
		}catch (\Exception $e) {
			var_dump($app["service.viaCallable.my"]);
		}

		return "";
	}

}
