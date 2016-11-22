<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Client;

class GuzzleAdapter implements Adapter {

    private $client;
    private $endPoint;

    public function __construct($endPoint){
        $this->endPoint = $endPoint;
        $this->client = new Client();
    }

    public function get($id){
        $response = $this->client->requestAsync(
            "get",
            $this->endPoint . $id,
            ["http_errors" => true]
        );

        return $response;
    }

    public function getHandlerStack()
    {
        return $this->client->getConfig('handler');
    }

}
