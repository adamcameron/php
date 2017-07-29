<?php

$person1 = new class('Kate', 'Sheppard') {

	private $firstName;
	private $lastName;
	
	public function __construct($firstName, $lastName){
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
	
	public function getFullName(){
		return "{$this->firstName} {$this->lastName}";
	}
};

echo $person1->getFullName() . PHP_EOL;
//echo "First name: $person1->firstName" . PHP_EOL;
//echo "Last name: $person1->lastName" . PHP_EOL;


echo PHP_EOL . PHP_EOL;

$person2 = (object) [
	'firstName' => null,
	'lastName' => null,
	'__construct' => function ($firstName, $lastName) use (&$person2) {
		$person2->firstName = $firstName;
		$person2->lastName = $lastName;
	},
	'getFullName' => function () use (&$person2) {
		return "{$person2->firstName} {$person2->lastName}";
	}
];

($person2->__construct)('Emmeline', 'Pankhurst');
echo ($person2->getFullName)() . PHP_EOL;
echo "First name: {$person2->firstName}" . PHP_EOL;
echo "Last name: {$person2->lastName}" . PHP_EOL;

echo PHP_EOL . PHP_EOL;
 
 
$person3 = new stdclass();
$person3->firstName = null;
$person3->initial = null;
$person3->lastName = null;
$person3->__construct = function ($firstName, $initial, $lastName) use (&$person3) {
	$person3->firstName = $firstName;
	$person3->initial = $initial;
	$person3->lastName = $lastName;
};
$person3->getFullName = function () use (&$person3) {
	return "{$person3->firstName} {$person3->initial}  {$person3->lastName}";
}; 

($person3->__construct)('Susan', 'B', 'Anthony');
echo ($person3->getFullName)() . PHP_EOL;
echo "First name: {$person3->firstName}" . PHP_EOL;
echo "Initial: {$person3->initial}" . PHP_EOL;
echo "Last name: {$person3->lastName}" . PHP_EOL;

echo PHP_EOL . PHP_EOL;

$person4 = (function($firstName, $lastName){
	return (object)[
		'getFullName' => function() use ($firstName, $lastName){
			return "$firstName $lastName";
		}
	];
})('Vida', 'Goldstein');
echo ($person4->getFullName)() . PHP_EOL;

//echo "First name: {$person4->firstName}" . PHP_EOL;
//echo "Last name: {$person4->lastName}" . PHP_EOL;

