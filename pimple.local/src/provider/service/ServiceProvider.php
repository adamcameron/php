<?php

namespace me\adamcameron\pimpleBug\provider\service;

use me\adamcameron\pimpleBug\service\MyService;
use Silex;

class ServiceProvider extends BaseServiceProvider {


    public function register(Silex\Application $app) {

        $app["service.viaInline.my"] = $app->share(function() {
            return new MyService();
        });

        try {
            $app["service.viaCallable.my"] = $app->share([$this, "provideMyService"]);
        } catch (\Exception $e) {
           echo $e->getMessage() . PHP_EOL;
        }

    }

    public function provideMyService() {
        return new MyService();
    }

}
