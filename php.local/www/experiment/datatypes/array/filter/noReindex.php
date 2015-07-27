<?php
$numbers = ["tahi","rua","toru","wha"];
var_dump($numbers);
$four = array_filter($numbers, function($number){
    return $number == "wha";
});
var_dump($four);