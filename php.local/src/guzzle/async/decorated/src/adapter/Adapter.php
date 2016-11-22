<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Promise\Promise;

interface Adapter {
	public function get($url, $parameters) : Promise;
}
