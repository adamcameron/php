<?php

namespace me\adamcameron\silex2\controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/** @codeCoverageIgnore */
class IndexController
{
    private $routes;

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    public function getInfo()
    {
        $routePaths = array_map(function (Route $route) {
            return $route->getPath();
        }, $this->routes->all());

        return new JsonResponse($routePaths, Response::HTTP_OK);
    }
}
