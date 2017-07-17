<?php
namespace me\adamcameron\silex2\provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;

class RouteProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container["routes"] = $container->extend("routes", function (RouteCollection $routes) {
            $loader = new YamlFileLoader(new FileLocator(__DIR__ . "/../../config"));
            $collection = $loader->load("routes.yaml");

            $routes->addCollection($collection);

            return $routes;
        });
    }
}
