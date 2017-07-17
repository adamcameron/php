<?php

namespace me\adamcameron\silex2\provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Provider\TwigServiceProvider;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple->register(new TwigServiceProvider(), [
            'twig.path' => __DIR__ . '/../view'
        ]);
    }
}
