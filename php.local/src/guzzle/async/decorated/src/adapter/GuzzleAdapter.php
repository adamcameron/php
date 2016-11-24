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

    public function post($url, $body) : Promise {
        $options = ['form_params' => $body];

        $response = $this->client->requestAsync("post", $url, $options);

        return $response;
    }

    public function put($url, $body, $parameters) : Promise {
        $fullUrl = sprintf("%s?%s", $url, http_build_query($parameters));
        $options = ['form_params' => $body];

        $response = $this->client->requestAsync("put", $fullUrl, $options);

        return $response;
    }
}
