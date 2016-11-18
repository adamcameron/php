<?php

require_once __DIR__ . "/../vendor/autoload.php";

use React\Promise\Promise;

$p = new Promise(function () {
    echo "constructor resolve handler" . PHP_EOL;
    throw new \Exception('from promise', 1);
});

$p->then(function(){
    echo "then() resolve handler: we should not see this" . PHP_EOL;
}, function($err){
    echo "then() rejection handler" . PHP_EOL;

    $newException = new Exception(
        'from catch',
        2,
        $err
    );
    throw $newException;

    echo "just to be sure we're actually running the exception code above" . PHP_EOL;
});

$p->done(
    function(){
        echo "done() resolve handler: we should not see this" . PHP_EOL;
    },
    function($err){
        echo "done() rejection handler" . PHP_EOL;
        echo "Caught exception:" . PHP_EOL;
        var_dump(
            $err->getMessage(),
            $err->getCode()
        );
    }
);
