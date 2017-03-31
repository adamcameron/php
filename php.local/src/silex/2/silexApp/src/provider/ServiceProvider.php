<?php
namespace me\adamcameron\silexApp\provider;

use me\adamcameron\silexApp\service\RouteService;
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
