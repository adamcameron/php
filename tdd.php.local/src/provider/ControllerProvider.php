<?php
namespace me\adamcameron\tdd\provider;

use me\adamcameron\tdd\controller\HelloController;
use me\adamcameron\tdd\controller\PersonController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Provider\ServiceControllerServiceProvider;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->register(new ServiceControllerServiceProvider());

        $container['controller.hello'] = function () {
            return new HelloController();
        };

        $container['controller.person'] = function ($container) {
            return new PersonController($container['service.person']);
        };
    }
}
