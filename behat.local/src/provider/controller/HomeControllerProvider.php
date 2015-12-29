<?php
// HomeControllerProvider.php
namespace me\adamcameron\behattest\provider\controller;

use Silex;
use Silex\ControllerProviderInterface;

class HomeControllerProvider implements ControllerProviderInterface {

	public function connect(Silex\Application $app){
		$controllers = $app['controllers_factory'];

		$controllers->get('', 'controller.home:doGet')
			->method('GET')
			->bind('route.home');

		$controllers->get('/info/', 'controller.home:doGetInfo')
			->method('GET')
			->bind('route.home.info');
		return $controllers;
	}

}
