<?php

$timer = createTimer();

$json = file_get_contents(__DIR__ . '/uuids100k.json');
$timer->send('after reading file');

$records = json_decode($json);
$timer->send('after parsing JSON');

$justUuids = array_map(function($record){
    //return $record->uuid;
}, $records);
$timer->send('after calling array_map');

$justUuids = [];
foreach ($records as $record) {
    //$justUuids[] = $record->uuid;
}
$timer->send('after foreach');



$timer->send('stop');
var_dump($timer->getReturn());

function createTimer() {
    bcscale(6);
    $previous = microtime(true);
    $laps = [];
    while (true) {
        $label = yield;

        if ($label == 'stop') {
            return $laps;
        }

        $now = microtime(true);
        $laps[$label] = bcsub($now, $previous);
        $previous = $now;
    }
}