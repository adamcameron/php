<?php

namespace me\adamcameron\testApp\adapter;

use GuzzleHttp\Psr7\Response;

interface Adapter {
	public function get($id) : Response;
}
