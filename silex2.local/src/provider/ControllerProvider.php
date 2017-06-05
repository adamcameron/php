<?php
namespace me\adamcameron\silex2\provider;

use me\adamcameron\silex2\controller\HomeController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Provider\ServiceControllerServiceProvider;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->register(new ServiceControllerServiceProvider());

        $container['controller.home'] = function () {
            return new HomeController();
        };
    }
}
