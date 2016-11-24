<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Psr7\Response;
use me\adamcameron\testApp\service\LoggingService;

class StatusToExceptionAdapter implements Adapter
{

    private $adapter;
    private $exceptionMap;
    private $loggingService;

    public function __construct(Adapter $adapter, $exceptionMap, LoggingService $loggingService) {
        $this->adapter = $adapter;
        $this->exceptionMap = $exceptionMap;
        $this->loggingService = $loggingService;
    }

    public function get($url, $parameters) : Promise {
        return $this->adapter
            ->get($url, $parameters)
            ->then(function (Response $response) {
                return $this->handleThen($response);
            })
            ->otherwise(function ($exception) {
                $this->handleOtherwise($exception);
            });
    }

    public function post($url, $body, $parameters) : Promise {
        return $this->adapter
            ->post($url, $parameters, $body)
            ->then(function (Response $response) {
                return $this->handleThen($response);
            })
            ->otherwise(function ($exception) {
                $this->handleOtherwise($exception);
            });
    }

    private function handleThen(Response $response) : Response {
        $code = $response->getStatusCode();
        $this->loggingService->logMessage("StatusToExceptionAdapter: non-exception status encountered: $code");

        return $response;
    }

    private function handleOtherwise(\Throwable $throwable) {
        $code = $throwable->getCode();

        if (!array_key_exists($code, $this->exceptionMap)) {
            $this->loggingService->logMessage("StatusToExceptionAdapter: unmapped status encountered: $code");
            throw $throwable;
        }
        $this->loggingService->logMessage("StatusToExceptionAdapter: remapped status encountered: $code");
        throw new $this->exceptionMap[$code](
            "A response of $code was received from the service",
            $code,
            $throwable
        );
    }
}
