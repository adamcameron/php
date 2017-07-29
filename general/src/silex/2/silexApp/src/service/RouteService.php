<?php

namespace me\adamcameron\general\silexApp\service;

use Silex\Application;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;

class RouteService
{
    public function loadRoutes(Application $app)
    {
        $app["routes"] = $app->extend("routes", function (RouteCollection $routes) {
            $loader = new YamlFileLoader(new FileLocator(__DIR__ . "/../../config"));
            $collection = $loader->load("routes.yaml");

            $routes->addCollection($collection);

            return $routes;
        });
    }
}
