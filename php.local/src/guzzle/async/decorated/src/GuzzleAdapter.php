<?php

namespace me\adamcameron\testApp;

use GuzzleHttp\Client;

class GuzzleAdapter {

    private $client;
    private $endPoint = "http://cf2016.local:8516/cfml/misc/endpointForGuzzleTests.cfm?id=";

    public function __construct(){
        $this->client = new Client();
    }

    public function get($id){
        $response = $this->client->requestAsync(
            "get",
            $this->endPoint . $id
        );

        return $response;
    }

}
