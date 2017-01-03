<?php

namespace me\adamcameron\accounts;

require __DIR__ . '/model.php';

$wsdl = "http://localhost:8500/cfml/webservices/soap/accounts/public/Invoices.cfc?wsdl";


$options = [
	'trace' => true,
	'typemap' => [[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Address',
		'from_xml' => ['\me\adamcameron\accounts\Address', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Account',
		'from_xml' => ['\me\adamcameron\accounts\Account', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Product',
		'from_xml' => ['\me\adamcameron\accounts\Product', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'InvoiceLine',
		'from_xml' => ['\me\adamcameron\accounts\InvoiceLine', 'createFromXml']
	],[
		'type_ns' => 'http://accounts.adamcameron.me',
		'type_name' => 'Invoice',
		'from_xml' => ['\me\adamcameron\accounts\Invoice', 'createFromXml']
	]]
];

$client = new \SoapClient($wsdl, $options);

$invoice = $client->getById(2011);

var_dump($invoice);
echo "==============================" . PHP_EOL . PHP_EOL;
var_dump($client->__getLastResponse());
