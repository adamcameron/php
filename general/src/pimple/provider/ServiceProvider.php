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
        $pimple['service.config'] = function () {
            return new ConfigService();
        };
        $pimple['service.other'] = function ($pimple) {
            return new OtherService($pimple['service.config']);
        };
    }
}
