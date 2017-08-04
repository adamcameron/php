<?php

$ids = ["001", "002", "003", "004"];

$thisFile = basename(__FILE__);

$logger->logMessage(sprintf("(%s) Making requests...", $thisFile));

$responses = [];
foreach ($ids as $id){
    $logger->logMessage(sprintf("(%s) Requesting for %s", $thisFile, $id));
    $responses[] = $adapter->get($id);
}
$logger->logMessage(sprintf("(%s) Requests made", $thisFile));

sleep(10);

$logger->logMessage(sprintf("(%s) Getting bodies from requests...", $thisFile));
foreach ($responses as $response){
    $logger->logMessage(sprintf("(%s) before calling wait()", $thisFile));
    $body = $response->wait()->getBody()->getContents();
    $logger->logMessage(sprintf("(%s) Response Bodies: %s", $thisFile, $body));
}
$logger->logMessage("Done");
