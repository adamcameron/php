<?php

namespace me\adamcameron\testApp;

use GuzzleHttp\Client;

class GuzzleAdapter {

    private $client;
    private $endPoint = "http://php.local/experiment/guzzle/endpointForGuzzleTests.php?id=";

    public function __construct(){
        $this->client = new Client();
    }

    public function get($id){
        $response = $this->client->request(
            "get",
            $this->endPoint . $id,
            ["future"=>true]
        );

        return $response;
    }

}
