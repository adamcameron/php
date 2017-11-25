<?php

namespace me\adamcameron\spec\di;

use me\adamcameron\general\di\AlternativeLogger;
use me\adamcameron\general\di\StaticallyTypedService;
use Monolog\Handler\TestHandler;
use Monolog\Logger;

describe('statically-typed service tests', function () {

    describe('with monolog logger', function () {
        given('service', function () {
            return new StaticallyTypedService($this->logger);
        });

        given('logger', function () {
            $handler = new TestHandler();
            $logger = new Logger('testLog');
            $logger->pushHandler($handler);

            return $logger;
        });

        it ('is the correct type', function () {
            expect($this->service)->toBeAnInstanceOf(StaticallyTypedService::class);
        });
    });

    describe('with alternative logger', function () {
        given('logger', function () {
            return new AlternativeLogger();
        });

        it ('is the correct type', function () {
            $serviceCreation = function () {
                return new StaticallyTypedService($this->logger);
            };
            expect($serviceCreation)->toThrow(new \TypeError());
        });
    });
});
