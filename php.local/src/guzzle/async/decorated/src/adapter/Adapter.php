<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;

interface Adapter {
	public function get($url, $parameters) : Promise;
	public function post($url, $body, $parameters) : Promise;
}
