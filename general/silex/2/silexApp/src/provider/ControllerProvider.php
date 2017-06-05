<?php
namespace me\adamcameron\silexApp\provider;

use me\adamcameron\silexApp\controller\HelloController;
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
    }
}
