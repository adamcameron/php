<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;

class LoggingAdapter implements Adapter {

    private $adapter;
    private $logger;
    private $thisFile;

    public function __construct(Adapter $adapter, $logger) {
        $this->adapter = $adapter;
        $this->logger = $logger;
        $this->thisFile = explode(".", basename(__FILE__))[0];
    }

	public function get($url, $parameters) : Promise {
		$encodedParameters = json_encode($parameters);
        $this->logger->logMessage(sprintf("%s: Requesting for %s", $this->thisFile, $encodedParameters));

        $response = $this->adapter->get($url, $parameters);

        $response->then(function($response) use ($encodedParameters) {
            $body = $response->getBody();
            $this->logger->logMessage(sprintf("%s: Response for %s: %s", $this->thisFile, $encodedParameters, $body));
            $body->rewind();
        });

        return $response;
    }

}
