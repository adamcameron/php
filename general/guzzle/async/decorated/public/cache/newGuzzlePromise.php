<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use \GuzzleHttp\Promise\Promise;

$p = new Promise(function() use (&$p){
    $p->resolve("what we're looking for");
});

$result = $p->wait();

var_dump($result);
