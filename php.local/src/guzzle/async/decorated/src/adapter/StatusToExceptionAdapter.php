<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Psr7\Response;
use me\adamcameron\testApp\service\LoggingService;

class StatusToExceptionAdapter implements Adapter
{

    private $adapter;
    private $exceptionMap;
    private $loggingService;

    public function __construct(Adapter $adapter, $exceptionMap, LoggingService $loggingService)
    {
        $this->adapter = $adapter;
        $this->exceptionMap = $exceptionMap;
        $this->loggingService = $loggingService;
    }

    public function get($status)
    {
        return $this->adapter
            ->get($status)
            ->then(function (Response $response) {
                return $this->handleThen($response);
            })
            ->otherwise(function ($exception) {
                $this->handleOtherwise($exception);
            });
    }

    private function handleThen($response)
    {
        $code = $response->getStatusCode();
        $this->loggingService->logMessage("StatusToExceptionAdapter: non-exception status encountered: $code");

        return $response;
    }

    private function handleOtherwise($exception)
    {
        $code = $exception->getCode();

        if (!array_key_exists($code, $this->exceptionMap)) {
            $this->loggingService->logMessage("StatusToExceptionAdapter: unmapped status encountered: $code");
            throw $exception;
        }
        $this->loggingService->logMessage("StatusToExceptionAdapter: remapped status encountered: $code");
        throw new $this->exceptionMap[$code](
            "A response of $code was received from the service",
            $code,
            $exception
        );
    }
}