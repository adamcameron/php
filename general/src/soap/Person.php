<?php

namespace me\adamcameron\geneal\soap;

class Person {
	
	public $id;
	public $firstName;
	public $lastName;
	
	public function __construct(int $id, $firstName, $lastName){
		$this->id = $id;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
}
