<?php

namespace me\adamcameron\silex2\provider;

use me\adamcameron\silex2\model\Number;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FactoryProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['factory.number'] = $container->protect(function ($id, $name) {
            return new Number($id, $name);
        });
    }
}
