<?php 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "example.com"); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

$output = curl_exec($ch); 

curl_close($ch); 

var_dump($output);
