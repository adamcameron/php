<?php
namespace me\adamcameron\accounts;

require __DIR__ . '/model.php';

$address = new Address(1, "London", "United Kingdom", "E18");

$account = new PersonalAccount(2, "Adam", "Cameron", \DateTime::createFromFormat("Y-m-d", "1970-02-17"), $address);

$penguin = new Product(3, "Penguin", 1.23);
$pangolin = new Product(4, "Pangolin", 4.56);
$platypus = new Product(5, "Playtpus", 7.89);

$lines = [
	$penguin,
	$pangolin,
	$platypus
];

$invoice = new Invoice(6, $account, $lines);
var_dump($invoice);

