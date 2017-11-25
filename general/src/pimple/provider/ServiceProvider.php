<?php

namespace me\adamcameron\general\pimple\provider;

use me\adamcameron\general\pimple\service\ConfigService;
use me\adamcameron\general\pimple\service\OtherService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $config = new ConfigService();;

        $pimple['service.config'] = function () use ($config) {
            return $config;
        };
        $pimple['service.other'] = function ($pimple) {
            return new OtherService($pimple['service.config']);
        };
    }
}
