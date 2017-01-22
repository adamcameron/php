<?php
namespace me\adamcameron\tdd\provider;

use me\adamcameron\tdd\service\RouteService;
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
