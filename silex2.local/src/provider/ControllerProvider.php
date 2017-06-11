<?php
namespace me\adamcameron\silex2\provider;

use me\adamcameron\silex2\controller\HomeController;
use me\adamcameron\silex2\controller\NumberController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Provider\ServiceControllerServiceProvider;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->register(new ServiceControllerServiceProvider());

        $container['controller.home'] = function ($container) {
            return new HomeController($container['twig']);
        };

        $container['controller.number'] = function () {
            return new NumberController();
        };
    }
}
