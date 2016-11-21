<?php

$rounds = ["no-cached", "cached"];
$ids = ["001", "002"];


echo "Making requests" . PHP_EOL . PHP_EOL;
$responses = [];
foreach($rounds as $round) {
    foreach ($ids as $id) {
        echo "Requesting: $round/$id" . PHP_EOL;
        $responses[] = $adapter->get($id);
    }
}
echo "Requests made" . PHP_EOL . PHP_EOL;


echo "Fetching responses" . PHP_EOL . PHP_EOL;
foreach ($responses as $response){
    $body = (string) $response->wait()->getBody();
    echo "Body: $body" . PHP_EOL . PHP_EOL;
}
echo "Responses fetched" . PHP_EOL . PHP_EOL;
