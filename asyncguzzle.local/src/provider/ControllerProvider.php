<?php

namespace me\adamcameron\asyncguzzle\provider;

use me\adamcameron\asyncguzzle\controller\HelloController;
use me\adamcameron\asyncguzzle\controller\IndexController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Provider\ServiceControllerServiceProvider;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->register(new ServiceControllerServiceProvider());

        $container['controller.index'] = function () {
            return new IndexController();
        };

        $container['controller.hello'] = function () {
            return new HelloController();
        };
    }
}
