<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use \GuzzleHttp\Promise\Promise;

$p = new Promise(function(){
	echo "constructor resolve handler" . PHP_EOL;
	throw new Exception("EXCEPTION from promise", 1);
});

$p2 = $p->then(function(){
	echo "then() resolve handler: we should not see this" . PHP_EOL;
}, function($err){
	echo "then() rejection handler" . PHP_EOL;
	$newException = new Exception("EXCEPTION from then rejection handler", 2, $err);
	throw $newException;
});

$p2->wait(function(){
	echo "done() resolve handler: we should not see this" . PHP_EOL;
}, function($err){
	echo "wait() rejection handler" . PHP_EOL;
	echo "Caught exception:" . PHP_EOL;
	var_dump([
		"message" => $err->getMessage(),
		"code" => $err->getCode(),
		"previous" => [
			"message" => $err->getPrevious()->getMessage(),
			"code" => $err->getPrevious()->getCode()
		]
	]);
});

