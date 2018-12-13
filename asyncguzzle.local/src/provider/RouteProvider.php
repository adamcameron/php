<?php

namespace me\adamcameron\asyncguzzle\provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RouteCollection;

class RouteProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['request_matcher'] = function ($app) {
            return new UrlMatcher($app['routes'], $app['request_context']);
        };

        $container['routes'] = $container->extend(
            'routes',
            function (RouteCollection $routes) use ($container) {
                $loader = new YamlFileLoader(
                    new FileLocator(dirname(__DIR__) . '/../config')
                );
                $collection = $loader->load('routes.yml');
                $routes->addCollection($collection);

                return $routes;
            }
        );
    }
}
