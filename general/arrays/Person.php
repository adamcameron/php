<?php

class Person
{
	public $id;
	public $firstName;
	public $gender;

	public function __construct($id, $firstName, $gender)
	{
		$this->id = $id;
		$this->firstName = $firstName;
		$this->gender = $gender;
	}
}