<?php

namespace me\adamcameron\testApp;

class LoggedGuzzleAdapter {

    private $adapter;
    private $logger;
    private $thisFile;

    public function __construct($adapter, $logger) {
        $this->adapter = $adapter;
        $this->logger = $logger;
        $this->thisFile = basename(__FILE__);
    }

    public function get($id){
        $this->logger->logMessage(sprintf("(%s) Requesting for %s", $this->thisFile, $id));

        $response = $this->adapter->get($id);

        $response->then(function($response) use ($id){
            $body = $response->getBody();
            $this->logger->logMessage(sprintf("(%s) Response for %s: %s", $this->thisFile, $id, $body));
            $body->rewind();
        });

        return $response;
    }

}
