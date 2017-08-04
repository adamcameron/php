<?php
namespace me\adamcameron\general\silexApp\provider;

use me\adamcameron\general\silexApp\controller\HelloController;
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
