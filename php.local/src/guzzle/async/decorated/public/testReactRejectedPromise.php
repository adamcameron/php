<?php

require_once __DIR__ . "/../vendor/autoload.php";

use React\Promise\Promise;

$promise = new Promise(function () {
    try {
        throw new \Exception('EXCEPTION FROM PROMISE');
    } catch(Exception $e){
        return new \React\Promise\RejectedPromise($e);
    }
});

$promise->then(function(){
    echo "Not expecting to see this";
}, function(){
    echo "well I got this far";
    throw new \Exception("EXCEPTION FROM REJECTOR");
});

$promise->done();

/*
$resolver = function (callable $resolve, callable $reject) {
    // Do some work, possibly asynchronously, and then
    // resolve or reject.

    $resolve($awesomeResult);
    // or $resolve($anotherPromise);
    // or $reject($nastyError);
};

$canceller = function (callable $resolve, callable $reject) {
    // Cancel/abort any running operations like network connections, streams etc.

    $reject(new \Exception('Promise cancelled'));
};

$promise = new React\Promise\Promise($resolver, $canceller);
 */
