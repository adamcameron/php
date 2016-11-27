<?php
$numbers = [
    "one" => "tahi",
    "two" => "rua",
    "three" => "toru",
    "four" => "wha",
    "five" => "rima",
    "six" => "ono",
    "seven" => "whitu",
    "eight" => "waru",
    "nine" => "iwa",
    "ten" => "tekau"
];

$numbers2 = array_reduce(array_keys($numbers), function($result, $key) use ($numbers) {
    $result[] = ["en" => $key, "mi" => $numbers[$key]];
    return $result;
}, []);

var_dump($numbers2);