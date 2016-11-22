<?php

echo "Getting not-yet cached results" . PHP_EOL . PHP_EOL;
makeRequests($adapter);

echo "===================================================" .PHP_EOL . PHP_EOL;

sleep(10);

echo "Getting results again (from cache)" . PHP_EOL . PHP_EOL;
makeRequests($adapter);


function makeRequests($adapter){
    $ids = ["001", "002"];
    $responses = [];
    foreach ($ids as $id) {
        echo "Making requests" . PHP_EOL . PHP_EOL;
        echo "Requesting: $id" . PHP_EOL;
        $responses[] = $adapter->get($id);
        echo "Requests made" . PHP_EOL . PHP_EOL;
    }
    echo "Fetching responses" . PHP_EOL . PHP_EOL;
    foreach ($responses as $response){
        $body = (string) $response->wait()->getBody();
        echo "Body: $body" . PHP_EOL . PHP_EOL;
    }
    echo "Responses fetched" . PHP_EOL . PHP_EOL;
}
