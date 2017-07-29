<?php
namespace me\adamcameron\general\silexApp\provider;

use me\adamcameron\general\silexApp\service\RouteService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['service.route'] = function () {
            return new RouteService();
        };
    }
}
