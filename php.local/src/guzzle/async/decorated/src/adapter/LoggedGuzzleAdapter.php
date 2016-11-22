<?php

namespace me\adamcameron\testApp\adapter;

class LoggedGuzzleAdapter implements Adapter {

    private $adapter;
    private $logger;
    private $thisFile;

    public function __construct(Adapter $adapter, $logger) {
        $this->adapter = $adapter;
        $this->logger = $logger;
        $this->thisFile = explode(".", basename(__FILE__))[0];
    }

    public function get($id){
        $this->logger->logMessage(sprintf("%s: Requesting for %s", $this->thisFile, $id));

        $response = $this->adapter->get($id);

        $response->then(function($response) use ($id){
            $body = $response->getBody();
            $this->logger->logMessage(sprintf("%s: Response for %s: %s", $this->thisFile, $id, $body));
            $body->rewind();
        });

        return $response;
    }

}
