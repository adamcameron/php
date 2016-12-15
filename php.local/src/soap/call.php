<?php

namespace wri;

require realpath(__DIR__ . '\vendor\autoload.php');


$scheme = 'https://';
$host = 'hostelworld-dev.neolane.net';
$uri = '/nl/jsp/soaprouter.jsp';

$wsdl = $scheme . $host . $uri;

$options = [
    'trace' => 1,
    'exceptions' => true,
    'location' => $scheme . $host,
    'uri' => $uri,
    'login' => 'hswapi',
    'password' => 'j3kksd73l2!hkd2'
];


$soapClient = new \wri\SoapClient($wsdl, $options);

var_dump($soapClient);
var_dump($soapClient->__getFunctions());
