<?php

namespace me\adamcameron\spec\di;

use me\adamcameron\general\di\AlternativeLogger;
use me\adamcameron\general\di\DynamicallyTypedService;
use Monolog\Handler\TestHandler;
use Monolog\Logger;

describe('dynamic service tests', function () {
    given('service', function () {
        return new DynamicallyTypedService($this->logger);
    });

    describe('with monolog logger', function () {

        given('logger', function () {
            $handler = new TestHandler();
            $logger = new Logger('testLog');
            $logger->pushHandler($handler);

            return $logger;
        });

        it ('is the correct type', function () {
            expect($this->service)->toBeAnInstanceOf(DynamicallyTypedService::class);
        });
    });

    describe('with alternative logger', function () {
        given('logger', function () {
            return new AlternativeLogger();
        });

        it ('is the correct type', function () {
            expect($this->service)->toBeAnInstanceOf(DynamicallyTypedService::class);
        });
    });
});
