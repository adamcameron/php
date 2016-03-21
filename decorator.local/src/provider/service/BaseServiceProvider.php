<?php

namespace me\adamcameron\decorator\provider\service;

use Silex\ServiceProviderInterface;
use Silex;

abstract class BaseServiceProvider implements ServiceProviderInterface {

	public function register(Silex\Application $app){
		parent::register($app);
	}

	public function boot(Silex\Application $app){
		// nop
	}

}
