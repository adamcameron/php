<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;

interface Adapter {
	public function get($url, $parameters) : Promise;
	public function post($url, $body) : Promise;
	public function put($url, $body, $parameters) : Promise;
}
