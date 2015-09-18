<?php
// Home.php
namespace me\adamcameron\misc\provider\controller;

use Silex;
use Silex\ControllerProviderInterface;

class Home implements ControllerProviderInterface {

	public function connect(Silex\Application $app){
		$controllers = $app['controllers_factory'];

		$controllers->get('', 'controller.home:doGet')
			->method('GET')
			->bind('route.home');
		return $controllers;

$controllers->get('/woo', function () use ($app) {
	var_dump(func_get_args());
	die;
    
});

	}

}
