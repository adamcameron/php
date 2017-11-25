<?php
namespace me\adamcameron\silex2\provider;

use me\adamcameron\silex2\controller as controller;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Provider\ServiceControllerServiceProvider;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->register(new ServiceControllerServiceProvider());

        $container['controller.home'] = function ($container) {
            return new controller\HomeController($container['twig']);
        };

        $container['controller.api.index'] = function ($container) {
            return new controller\IndexController($container['config']);
        };

        $container['controller.number'] = function ($container) {
            return new controller\NumberController($container['repository.number']);
        };
    }
}
