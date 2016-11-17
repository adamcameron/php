<?php

require_once __DIR__ . "/../vendor/autoload.php";

use GuzzleHttp\Promise\Promise;

$promise = new Promise(function () {
    return "hi";
    throw new \Exception('EXCEPTION FROM PROMISE');
});
echo "after creating promise" . PHP_EOL;

$promise->then(function(){
    echo "Not expecting to see this" . PHP_EOL;
}, function($exception){
    echo "well I got this far" . PHP_EOL;
    //return new \GuzzleHttp\Promise\RejectedPromise(new \Exception("EXCEPTION FROM REJECTOR"));
    throw new \Exception("EXCEPTION FROM REJECTOR", $exception->getCode(), $exception);
});
echo "after calling then" . PHP_EOL;

$promise->wait(); // throws the exception.