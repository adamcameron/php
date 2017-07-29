<?php

namespace me\adamcameron\geneal\soap;

require __DIR__ . '/model.php';

$wsdl = "http://localhost:8516/cfml/webservices/soap/accounts/public/Invoices.cfc?wsdl";


$options = [
	'trace' => true,
	'typemap' => [[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Address',
		'from_xml' => ['\me\adamcameron\geneal\soap\Address', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Account',
		'from_xml' => ['\me\adamcameron\geneal\soap\Account', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Product',
		'from_xml' => ['\me\adamcameron\geneal\soap\Product', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'InvoiceLine',
		'from_xml' => ['\me\adamcameron\geneal\soap\InvoiceLine', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Invoice',
		'from_xml' => ['\me\adamcameron\geneal\soap\Invoice', 'createFromXml']
	]]
];

$client = new \SoapClient($wsdl, $options);

$invoice = $client->getById(2011);

var_dump($invoice);
echo "==============================" . PHP_EOL . PHP_EOL;
var_dump($client->__getLastResponse());
