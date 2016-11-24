<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;

class GuzzleAdapter implements Adapter {

    private $client;

    public function __construct() {
        $this->client = new Client();
    }

    public function get($url, $parameters) : Promise {
        $fullUrl = sprintf("%s?%s", $url, http_build_query($parameters));

        $response = $this->client->requestAsync("get", $fullUrl);

        return $response;
    }
}
