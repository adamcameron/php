<?php

$raw = '<Response xmlns="http://example.com/ns/">
   <user>
      <dateOfBirth>1947-01-08</dateOfBirth>
      <firstName>Ziggy</firstName>
      <lastName>Stardust</lastName>
      <gender>?</gender>
   </user>
</Response>
';
$xml = new SimpleXMLElement($raw);
/*
$usingLocalName = $xml->xpath("/*[local-name()='Response']/*[local-name()='user']/*[local-name()='firstName']");
var_dump($usingLocalName);*/

$xml->registerXPathNamespace('db', 'http://example.com/ns/');
$usingRegisteredNamespace = $xml->xpath("/db:Response/db:user/db:lastName");
var_dump($usingRegisteredNamespace);
die;

$usingWildcardNamespace = $xml->xpath("/*:Response/*:user/*:gender");
var_dump($usingWildcardNamespace);
