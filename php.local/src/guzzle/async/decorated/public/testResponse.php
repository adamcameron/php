<?php

require __DIR__ . "/../vendor/autoload.php";

$guzzleAdapter = new \me\adamcameron\testApp\GuzzleAdapter();

$response = $guzzleAdapter->get(24);

var_dump($response);
