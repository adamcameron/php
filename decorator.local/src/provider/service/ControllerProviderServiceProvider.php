<?php
namespace me\adamcameron\decorator\provider\service;

use me\adamcameron\decorator\provider\controller\ControllerProvider;
use Silex;

class ControllerProviderServiceProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {
		$app["provider.controller"] = $app->share(function() {
			return new ControllerProvider();
		});
	}

}
