<?php

namespace me\adamcameron\silex2\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;

/** @codeCoverageIgnore */
class IndexController
{

	public function __construct($config, RouteCollection $routes)
	{
		$this->config = $config;
		$this->routes = $routes;
	}

	public function getInfo()
	{
		return new JsonResponse([], Response::HTTP_OK);
	}
}
