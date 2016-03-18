<?php
namespace me\adamcameron\decorator\provider\service;

use me\adamcameron\decorator\provider\controller\HomeControllerProvider;
use Silex;

class ControllerProviderServiceProvider extends BaseServiceProvider {

	public function register(Silex\Application $app) {
		$app["provider.controller.home"] = $app->share(function() {
			return new HomeControllerProvider();
		});
	}

}
