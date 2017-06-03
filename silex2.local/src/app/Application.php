<?php

namespace me\adamcameron\silex2\app;

use me\adamcameron\silex2\provider\ConfigProvider;
use me\adamcameron\silex2\provider\ControllerProvider;
use me\adamcameron\silex2\provider\RouteProvider;
use Silex\Application as SilexApplication;

class Application extends SilexApplication
{

	public function __construct(array $values)
	{
		parent::__construct($values);

		$this->registerProviders();
	}

	private function registerProviders()
	{
		$this->register(new ConfigProvider());
		$this->register(new RouteProvider());
		$this->register(new ControllerProvider());
	}
}
